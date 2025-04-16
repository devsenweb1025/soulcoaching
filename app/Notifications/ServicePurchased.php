<?php

namespace App\Notifications;

use App\Models\Service;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ServicePurchased extends Notification implements ShouldQueue
{
    use Queueable;

    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Dienstleistung gekauft')
            ->greeting('Hallo ' . $notifiable->first_name . '!')
            ->line('Sie haben die Dienstleistung "' . $this->service->title . '" gekauft.')
            ->line('Preis: CHF ' . number_format($this->service->price, 2))
            ->action('Dienstleistung anzeigen', url('/services/' . $this->service->id))
            ->line('Vielen Dank für Ihren Kauf!');
    }

    public function toArray($notifiable)
    {
        return [
            'title' => 'Dienstleistung gekauft',
            'message' => 'Sie haben die Dienstleistung "' . $this->service->title . '" gekauft.',
            'type' => 'service_purchased',
            'icon' => 'fas fa-shopping-cart',
            'service_id' => $this->service->id,
        ];
    }
}
