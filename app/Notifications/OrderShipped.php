<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderShipped extends Notification implements ShouldQueue
{
    use Queueable;

    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Ihre Bestellung wurde versendet')
            ->greeting('Hallo ' . $notifiable->first_name . '!')
            ->line('Ihre Bestellung #' . $this->order->id . ' wurde versendet.')
            ->line('Tracking-Nummer: ' . $this->order->tracking_number)
            ->action('Bestellung verfolgen', url('/orders/' . $this->order->id))
            ->line('Vielen Dank für Ihren Einkauf!');
    }

    public function toArray($notifiable)
    {
        return [
            'title' => 'Bestellung versendet',
            'message' => 'Ihre Bestellung #' . $this->order->id . ' wurde versendet.',
            'type' => 'order_shipped',
            'icon' => 'fas fa-truck',
            'order_id' => $this->order->id,
        ];
    }
}
