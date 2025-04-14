<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CalendlyService
{
    protected $apiKey;
    protected $baseUrl = 'https://api.calendly.com';

    public function __construct()
    {
        $this->apiKey = config('services.calendly.api_key');
    }

    public function getHeaders()
    {
        return [
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type' => 'application/json',
        ];
    }

    public function getUserUri()
    {
        $response = Http::withOptions([
            'verify' => false
        ])->withToken($this->apiKey)
            ->get($this->baseUrl . '/users/me');

        return $response->json('resource.uri');
    }

    public function getEventTypes()
    {
        try {
            $response = Http::withHeaders($this->getHeaders())
                ->get($this->baseUrl . '/event_types');

            return $response->json();
        } catch (\Exception $e) {
            Log::error('Calendly API Error: ' . $e->getMessage());
            return null;
        }
    }

    public function createInvitee($eventType, $email, $name, $notes = '')
    {
        try {
            $response = Http::withHeaders($this->getHeaders())
                ->post($this->baseUrl . '/scheduled_events', [
                    'event_type' => $eventType,
                    'invitee' => [
                        'email' => $email,
                        'name' => $name,
                        'notes' => $notes,
                    ],
                ]);

            return $response->json();
        } catch (\Exception $e) {
            Log::error('Calendly API Error: ' . $e->getMessage());
            return null;
        }
    }

    public function getScheduledEvents()
    {

        $userUri = $this->getUserUri();

        $response = Http::withOptions([
            'verify' => false
        ])->withToken($this->apiKey)
            ->get($this->baseUrl . '/scheduled_events', [
                'user' => $userUri
            ]);

        return $response->json();
    }

    public function getInvitees($eventUri)
    {
        $response = Http::withOptions([
            'verify' => false
        ])->withToken($this->apiKey)
            ->get($eventUri . '/invitees', [
                'event' => $eventUri
            ]);

        return $response->json();
    }

    public function getSchedulingUrl()
    {
        return config('services.calendly.scheduling_url');
    }
}
