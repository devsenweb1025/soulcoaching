<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class NewsletterController extends Controller
{
    private $mailchimpApiKey;
    private $mailchimpListId;
    private $mailchimpServer;

    public function __construct()
    {
        $this->mailchimpApiKey = config('newsletter.drivers.mailchimp.apiKey');
        $this->mailchimpListId = config('newsletter.drivers.mailchimp.listId');
        $this->mailchimpServer = config('newsletter.drivers.mailchimp.serverPrefix');

        if (empty($this->mailchimpApiKey) || empty($this->mailchimpListId) || empty($this->mailchimpServer)) {
            Log::error('Mailchimp configuration is missing. Please check your .env file.');
        }
    }

    public function subscribe(Request $request)
    {
        if (empty($this->mailchimpApiKey) || empty($this->mailchimpListId) || empty($this->mailchimpServer)) {
            return response()->json([
                'message' => 'Newsletter service is currently unavailable.'
            ], 503);
        }

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'birthday_month' => 'required|digits:2|between:01,12',
            'birthday_day' => 'required|digits:2|between:01,31',
            'consent' => 'required|accepted'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Bitte überprüfen Sie Ihre Eingaben.'
            ], 422);
        }

        try {
            $response = Http::withBasicAuth('anystring', $this->mailchimpApiKey)
                ->post("https://{$this->mailchimpServer}.api.mailchimp.com/3.0/lists/{$this->mailchimpListId}/members", [
                    'email_address' => $request->email,
                    'status' => 'subscribed',
                    'merge_fields' => [
                        'BIRTHDAY' => sprintf('%02d/%02d', $request->birthday_month, $request->birthday_day)
                    ]
                ]);

            if ($response->failed()) {
                Log::error('Mailchimp API error: ' . $response->body());
                
                // Check if user is already subscribed
                $errorData = $response->json();
                if (isset($errorData['title']) && $errorData['title'] === 'Member Exists') {
                    return response()->json([
                        'message' => 'Sie sind bereits für unseren Newsletter angemeldet!'
                    ], 409);
                }
                
                // Check if email is not found in the list
                if (isset($errorData['title']) && $errorData['title'] === 'Forgotten Email Not Subscribed') {
                    return response()->json([
                        'message' => 'Diese E-Mail wurde dauerhaft gelöscht und kann nicht erneut importiert werden. Der Kontakt muss sich erneut anmelden, um wieder in die Liste aufgenommen zu werden.'
                    ], 404);
                }
                
                throw new \Exception('Ein Fehler ist bei der Anmeldung aufgetreten.');
            }

            return response()->json([
                'message' => 'Vielen Dank für Ihre Anmeldung!'
            ]);

        } catch (\Exception $e) {
            Log::error('Newsletter subscription error: ' . $e->getMessage());
            return response()->json([
                'message' => 'Ein Fehler ist bei der Anmeldung aufgetreten.',
            ], 500);
        }
    }
}
