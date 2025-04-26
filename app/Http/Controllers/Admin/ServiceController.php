<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the services.
     */
    public function index(Request $request)
    {
        $query = Service::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $services = $query->latest()->paginate(10);

        if ($request->ajax()) {
            return view('pages.admin.services.partials.table', compact('services'))->render();
        }

        return view('pages.admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service.
     */
    public function create()
    {
        return view('pages.admin.services.create');
    }

    /**
     * Store a newly created service in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'method' => 'required|in:online,in-person,hybrid',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'is_live_chat' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
            'hotline_active' => 'boolean',
            'image_direction' => 'required|in:left,right',
            'service_option' => 'required|in:payment,booking,hotline',
            'benefit_option' => 'required|in:month,per call,hour,min',
            'features' => 'nullable|array',
            'features.*' => 'string|max:255'
        ]);

        $data = $request->except('image');
        $data['slug'] = Str::slug($request->title);
        $data['is_featured'] = $request->has('is_featured');
        $data['is_active'] = $request->has('is_active');
        $data['hotline_active'] = $request->has('hotline_active');
        $data['is_live_chat'] = $request->has('is_live_chat');
        $data['features'] = array_filter($request->input('features', []));

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        Service::create($data);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    /**
     * Show the form for editing the specified service.
     */
    public function edit(Service $service)
    {
        return view('pages.admin.services.edit', compact('service'));
    }

    /**
     * Update the specified service in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'method' => 'required|in:online,in-person,hybrid',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'is_live_chat' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
            'hotline_active' => 'boolean',
            'image_direction' => 'required|in:left,right',
            'service_option' => 'required|in:payment,booking,hotline',
            'benefit_option' => 'required|in:month,per call,hour,min',
            'features' => 'nullable|array',
            'features.*' => 'string|max:255'
        ]);

        $data = $request->except('image');
        $data['slug'] = Str::slug($request->title);
        $data['is_featured'] = $request->has('is_featured');
        $data['is_active'] = $request->has('is_active');
        $data['hotline_active'] = $request->has('hotline_active');
        $data['is_live_chat'] = $request->has('is_live_chat');
        $data['features'] = array_filter($request->input('features', []));

        if ($request->hasFile('image')) {
            // Delete old image
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($data);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified service from storage.
     */
    public function destroy(Service $service)
    {
        // Delete image
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }

    /**
     * Toggle the active status of a service.
     */
    public function toggleActive(Service $service)
    {
        $service->update(['is_active' => !$service->is_active]);
        return response()->json(['success' => true]);
    }

    /**
     * Toggle the featured status of a service.
     */
    public function toggleFeatured(Service $service)
    {
        $service->update(['is_featured' => !$service->is_featured]);
        return response()->json(['success' => true]);
    }
}
