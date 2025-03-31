<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GoogleReviewController extends Controller
{
    private $placeId;
    private $apiKey;
    private $charLimit = 150; // Character limit for short text

    public function __construct()
    {
        $this->placeId = config('services.google.place_id');
        $this->apiKey = config('services.google.api_key');
    }

    public function getGoogleReviews()
    {
        try {
            $client = new Client([
                'verify' => false, // Disable SSL verification temporarily
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ]
            ]);

            $response = $client->get('https://maps.googleapis.com/maps/api/place/details/json', [
                'query' => [
                    'key' => $this->apiKey,
                    'place_id' => $this->placeId,
                    'fields' => 'reviews,rating,user_ratings_total',
                    'language' => 'de'
                ]
            ]);

            $data = json_decode($response->getBody(), true);

            if (!isset($data['result'])) {
                throw new \Exception('Invalid response from Google Places API');
            }

            // Process reviews to add short text versions
            $reviews = collect($data['result']['reviews'] ?? [])->map(function ($review) {
                $fullText = $review['text'];
                $shortText = mb_strlen($fullText) > $this->charLimit
                    ? mb_substr($fullText, 0, $this->charLimit) . '...'
                    : $fullText;

                return [
                    'author_name' => $review['author_name'],
                    'profile_photo_url' => $review['profile_photo_url'],
                    'rating' => $review['rating'],
                    'text' => $fullText,
                    'short_text' => $shortText,
                    'has_more' => mb_strlen($fullText) > $this->charLimit,
                    'time' => $review['time'],
                    'relative_time_description' => $review['relative_time_description'] ?? ''
                ];
            });

            return [
                'success' => true,
                'rating' => $data['result']['rating'] ?? 0,
                'total_reviews' => $data['result']['user_ratings_total'] ?? 0,
                'reviews' => $reviews->toArray()
            ];
        } catch (\Exception $e) {
            \Log::error('Google Places API Error: ' . $e->getMessage());

            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
}

