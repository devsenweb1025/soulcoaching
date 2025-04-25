<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Recaptcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        try {
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => config('services.recaptcha.secret_key'),
                'response' => $value,
                'remoteip' => request()->ip()
            ]);

            if (!$response->successful()) {
                Log::error('reCAPTCHA API request failed', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                return false;
            }

            $result = $response->json();

            // Log the score for monitoring
            Log::info('reCAPTCHA verification result', [
                'success' => $result['success'] ?? false,
                'score' => $result['score'] ?? null,
                'action' => $result['action'] ?? null,
                'hostname' => $result['hostname'] ?? null,
                'error_codes' => $result['error-codes'] ?? null
            ]);

            // For v3, we check both success and score
            // A score of 0.5 or higher is generally considered good
            return isset($result['success']) &&
                   $result['success'] === true &&
                   isset($result['score']) &&
                   $result['score'] >= 0.5;
        } catch (\Exception $e) {
            Log::error('reCAPTCHA verification failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Die reCAPTCHA-Überprüfung ist fehlgeschlagen. Bitte versuchen Sie es erneut.';
    }
}
