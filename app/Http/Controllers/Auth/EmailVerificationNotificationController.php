<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'email' => ['Wir können keinen Benutzer mit dieser E-Mail-Adresse finden.']
            ]);
        }

        if ($user->hasVerifiedEmail()) {
            return new JsonResponse([
                'status' => 'success',
                'message' => 'E-Mail-Adresse wurde bereits bestätigt',
                'data' => [
                    'verified' => true
                ]
            ], 200);
        }

        $user->sendEmailVerificationNotification();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Bestätigungslink wurde gesendet! Bitte überprüfen Sie Ihre E-Mails.',
            'data' => [
                'verified' => false
            ]
        ], 200);
    }
}
