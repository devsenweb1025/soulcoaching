<?php

namespace Database\Seeders;

use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ChatMessageSeeder extends Seeder
{
    public function run()
    {
        $users = User::take(5)->get();

        if ($users->isEmpty()) {
            return;
        }

        $messages = [
            [
                'message' => 'Hello, I have a question about the meditation course.',
                'is_read' => true,
                'read_at' => Carbon::now()->subMinutes(30)
            ],
            [
                'message' => 'What are the prerequisites for the energy healing course?',
                'is_read' => true,
                'read_at' => Carbon::now()->subHours(2)
            ],
            [
                'message' => 'Is there a payment plan available for the courses?',
                'is_read' => false
            ],
            [
                'message' => 'Can I get a certificate after completing the course?',
                'is_read' => true,
                'read_at' => Carbon::now()->subDays(1)
            ],
            [
                'message' => 'What time does the workshop start?',
                'is_read' => false
            ]
        ];

        foreach ($messages as $index => $message) {
            $user = $users[$index % $users->count()];

            ChatMessage::create([
                'user_id' => $user->id,
                'message' => $message['message'],
                'is_read' => $message['is_read'],
                'read_at' => $message['read_at'] ?? null,
                'created_at' => Carbon::now()->subDays(rand(1, 7))
            ]);
        }
    }
}
