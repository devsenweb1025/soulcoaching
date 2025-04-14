<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CalendlyService;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    protected $calendlyService;

    public function __construct(CalendlyService $calendlyService)
    {
        $this->calendlyService = $calendlyService;
    }

    public function index()
    {
        return view('pages.admin.bookings.index');
    }

    public function getEvents()
    {
        $events = $this->calendlyService->getScheduledEvents();

        if (!$events) {
            return response()->json([]);
        }

        return response()->json($events);
    }

    public function getInvitees(Request $request)
    {
        $invitees = $this->calendlyService->getInvitees($request->eventUri);
        return response()->json($invitees);
    }

    private function getEventColor($status)
    {
        return match ($status) {
            'active' => '#28a745', // Green
            'canceled' => '#dc3545', // Red
            default => '#6c757d', // Gray
        };
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'name' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $eventType = config('services.calendly.event_type');
        $result = $this->calendlyService->createInvitee(
            $eventType,
            $validated['email'],
            $validated['name'],
            $validated['notes'] ?? ''
        );

        if (!$result) {
            return response()->json(['message' => 'Failed to create booking'], 500);
        }

        return response()->json(['message' => 'Booking created successfully', 'data' => $result]);
    }

    public function update(Request $request, $id)
    {
        // Note: Calendly API doesn't support direct event updates
        // This would need to be handled through rescheduling or cancellation
        return response()->json(['message' => 'Updates must be handled through Calendly directly']);
    }

    public function destroy($id)
    {
        // Note: Implement if Calendly API supports cancellation
        return response()->json(['message' => 'Cancellations must be handled through Calendly directly']);
    }
}
