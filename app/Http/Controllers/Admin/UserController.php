<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $users = $query->latest()->paginate(10);

        if ($request->ajax()) {
            return view('pages.admin.users.partials.table', compact('users'))->render();
        }

        return view('pages.admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('pages.admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'gender' => 'nullable|in:male,female,other',
            'role' => ['required', Rule::in(['user', 'admin'])],
        ]);

        $data = $request->except('password');
        $data['password'] = Hash::make($request->password);
        $data['email_verified_at'] = $request->has('email_verified') ? now() : null;

        User::create($data);

        return redirect()->route('admin.users.index')
            ->with('success', 'Benutzer erfolgreich erstellt.');
    }

    public function edit(User $user)
    {
        return view('pages.admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:8|confirmed',
            'gender' => 'nullable|in:male,female,other',
            'role' => ['required', Rule::in(['user', 'admin'])],
        ]);

        $data = $request->except('password');
        $data['email_verified_at'] = $request->has('email_verified') ? now() : null;

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')
            ->with('success', 'Benutzer erfolgreich aktualisiert.');
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Sie können Ihren eigenen Account nicht löschen.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'Benutzer erfolgreich gelöscht.');
    }

    public function show(User $user)
    {
        // Load related data
        $user->load([
            'orders' => function($query) {
                $query->latest()->take(5);
            }
        ]);

        // Calculate statistics
        $totalOrders = $user->orders->count();
        $totalSpent = $user->orders->sum('total');

        return view('pages.admin.users.show', compact(
            'user',
            'totalOrders',
            'totalSpent'
        ));
    }

    public function toggleVerification(User $user)
    {
        $user->email_verified_at = $user->email_verified_at == null ? now() : null;

        $user->save();

        return response()->json([
            'success' => true,
            'message' => $user->email_verified_at ? 'E-Mail wurde verifiziert.' : 'E-Mail-Verifizierung wurde aufgehoben.'
        ]);
    }
}
