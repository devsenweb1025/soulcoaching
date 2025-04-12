<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    public function run()
    {
        $users = User::take(5)->get();
        $courses = Course::all();

        if ($users->isEmpty() || $courses->isEmpty()) {
            return;
        }

        $statuses = ['pending', 'confirmed', 'cancelled', 'completed'];
        $paymentStatuses = ['pending', 'paid', 'failed', 'refunded'];
        $paymentMethods = ['stripe', 'paypal'];

        foreach ($users as $user) {
            // Create 2-3 bookings per user
            $numberOfBookings = rand(2, 3);

            for ($i = 0; $i < $numberOfBookings; $i++) {
                $course = $courses->random();
                $status = $statuses[array_rand($statuses)];
                $paymentStatus = $paymentStatuses[array_rand($paymentStatuses)];
                $paymentMethod = $paymentMethods[array_rand($paymentMethods)];

                $booking = Booking::create([
                    'user_id' => $user->id,
                    'course_id' => $course->id,
                    'status' => $status,
                    'amount' => $course->price,
                    'payment_method' => $paymentStatus === 'pending' ? null : $paymentMethod,
                    'payment_status' => $paymentStatus,
                    'transaction_id' => $paymentStatus === 'paid' ? 'tr_' . uniqid() : null,
                    'notes' => $this->generateNotes($status, $paymentStatus),
                    'additional_data' => [
                        'course_title' => $course->title,
                        'course_start_date' => $course->start_date->format('Y-m-d'),
                        'booking_date' => Carbon::now()->subDays(rand(1, 30))->format('Y-m-d')
                    ],
                    'created_at' => Carbon::now()->subDays(rand(1, 30))
                ]);

                // Update course participants count if booking is confirmed
                if ($status === 'confirmed') {
                    $course->increment('current_participants');
                }
            }
        }
    }

    private function generateNotes($status, $paymentStatus)
    {
        $notes = [];

        if ($status === 'pending') {
            $notes[] = 'Awaiting confirmation';
        } elseif ($status === 'confirmed') {
            $notes[] = 'Booking confirmed';
        } elseif ($status === 'cancelled') {
            $notes[] = 'Booking cancelled by user';
        } elseif ($status === 'completed') {
            $notes[] = 'Course completed successfully';
        }

        if ($paymentStatus === 'pending') {
            $notes[] = 'Payment pending';
        } elseif ($paymentStatus === 'paid') {
            $notes[] = 'Payment received';
        } elseif ($paymentStatus === 'failed') {
            $notes[] = 'Payment failed';
        } elseif ($paymentStatus === 'refunded') {
            $notes[] = 'Payment refunded';
        }

        return implode('. ', $notes);
    }
}
