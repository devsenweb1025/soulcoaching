<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the events.
     */
    public function index(Request $request)
    {
        $query = Event::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('is_active', $request->status === 'active');
        }

        $events = $query->orderBy('event_date', 'desc')->paginate(10);

        if ($request->ajax()) {
            return view('pages.admin.events.partials.table', compact('events'))->render();
        }

        return view('pages.admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new event.
     */
    public function create()
    {
        return view('pages.admin.events.create');
    }

    /**
     * Store a newly created event in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'zoom_link' => 'required|url',
            'category' => 'required|string|max:255',
            'category_color' => 'required|string|max:20',
            'is_active' => 'boolean',
            'sort_order' => 'integer'
        ]);

        Event::create($validated);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event erfolgreich erstellt.');
    }

    /**
     * Display the specified event.
     */
    public function show(Event $event)
    {
        return view('pages.admin.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified event.
     */
    public function edit(Event $event)
    {
        return view('pages.admin.events.edit', compact('event'));
    }

    /**
     * Update the specified event in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'zoom_link' => 'required|url',
            'category' => 'required|string|max:255',
            'category_color' => 'required|string|max:20',
            'is_active' => 'boolean',
            'sort_order' => 'integer'
        ]);

        $event->update($validated);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event erfolgreich aktualisiert.');
    }

    /**
     * Remove the specified event from storage.
     */
        public function destroy(Event $event)
    {
        $event->delete();
        
        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Event erfolgreich gelöscht.'
            ]);
        }
        
        return redirect()->route('admin.events.index')
            ->with('success', 'Event erfolgreich gelöscht.');
    }

    /**
     * Toggle the active status of an event.
     */
    public function toggleActive(Event $event)
    {
        $event->update(['is_active' => !$event->is_active]);

        return response()->json([
            'success' => true,
            'message' => 'Event status erfolgreich geändert.',
            'is_active' => $event->is_active
        ]);
    }
}
