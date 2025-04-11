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
                'email' => ['We can\'t find a user with that email address.']
            ]);
        }

        if ($user->hasVerifiedEmail()) {
            return new JsonResponse([
                'status' => 'success',
                'message' => 'Email already verified',
                'data' => [
                    'verified' => true
                ]
            ], 200);
        }

        $user->sendEmailVerificationNotification();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Verification link sent! Please check your email.',
            'data' => [
                'verified' => false
            ]
        ], 200);
    }
}
