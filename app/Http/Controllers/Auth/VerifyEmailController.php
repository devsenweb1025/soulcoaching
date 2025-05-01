<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VerifyEmailController extends Controller
{
    /**
     * Mark the user's email address as verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  string  $hash
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, $id, $hash)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('verification.notice')
                ->with('error', 'Ungültiger Bestätigungslink. Benutzer nicht gefunden.');
        }

        if (!hash_equals((string) $hash, sha1($user->email))) {
            return redirect()->route('verification.notice')
                ->with('error', 'Ungültiger Bestätigungslink.');
        }

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('verification.notice')
                ->with('message', 'E-Mail-Adresse wurde bereits bestätigt.');
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));

            // Sign in the user
            Auth::login($user);

            return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
        }

        return redirect()->route('verification.notice')
            ->with('error', 'E-Mail-Adresse konnte nicht bestätigt werden. Bitte versuchen Sie es erneut oder fordern Sie einen neuen Bestätigungslink an.');
    }

    /**
     * Handle invalid verification links
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleInvalidVerification(Request $request)
    {
        return redirect()->route('verification.notice')
            ->with('error', 'Invalid or expired verification link. Please request a new verification email.');
    }
}
