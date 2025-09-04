<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use App\Mail\EventRegistrationNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class EventRegistrationController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'event_id' => 'required|exists:events,id',
            'email' => 'required|email|max:255',
            'name' => 'nullable|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $event = Event::findOrFail($request->event_id);
            
            // Check if already registered
            $existingRegistration = EventRegistration::where('event_id', $request->event_id)
                ->where('email', $request->email)
                ->first();

            if ($existingRegistration) {
                return response()->json([
                    'success' => false,
                    'message' => 'Du bist bereits für dieses Event angemeldet.'
                ], 409);
            }

            // Create registration
            $registration = EventRegistration::create([
                'event_id' => $request->event_id,
                'email' => $request->email,
                'name' => $request->name,
                'registered_at' => now()
            ]);

            // Send notification email to website owner
            // You can configure the owner's email in config/mail.php or .env
            $ownerEmail = config('mail.admin_email', 'info@seelen-fluesterin.ch');
            Mail::to($ownerEmail)->send(new EventRegistrationNotification($event, $registration));

            return response()->json([
                'success' => true,
                'message' => 'Vielen Dank für Deine Anmeldung! Den Zoom Link findest du auf der Website bei den Seelenlounge Terminen.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ein Fehler ist aufgetreten. Bitte versuche es später erneut.'
            ], 500);
        }
    }
}
