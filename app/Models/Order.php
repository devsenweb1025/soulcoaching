<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'status',
        'payment_method',
        'payment_status',
        'payment_id',
        'subtotal',
        'tax',
        'total',
        'shipping_cost',
        'shipping_first_name',
        'shipping_last_name',
        'shipping_email',
        'shipping_phone',
        'shipping_address',
        'shipping_city',
        'shipping_postal_code',
        'shipping_country',
        'tracking_number',
        'tracking_url',
        'notes',
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'tax' => 'decimal:2',
        'total' => 'decimal:2',
        'shipping_cost' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getStatusBadgeAttribute(): string
    {
        return match($this->status) {
            'pending' => '<span class="badge badge-light-warning">Ausstehend</span>',
            'processing' => '<span class="badge badge-light-primary">In Bearbeitung</span>',
            'shipped' => '<span class="badge badge-light-info">Versendet</span>',
            'delivered' => '<span class="badge badge-light-success">Zugestellt</span>',
            'completed' => '<span class="badge badge-light-success">Abgeschlossen</span>',
            'cancelled' => '<span class="badge badge-light-danger">Storniert</span>',
            'refunded' => '<span class="badge badge-light-info">Rückerstattet</span>',
            default => '<span class="badge badge-light-dark">Unbekannt</span>',
        };
    }

    public function getPaymentStatusBadgeAttribute(): string
    {
        return match($this->payment_status) {
            'pending' => '<span class="badge badge-light-warning">Ausstehend</span>',
            'completed' => '<span class="badge badge-light-success">Abgeschlossen</span>',
            'succeeded' => '<span class="badge badge-light-success">Erfolgreich</span>',
            'processing' => '<span class="badge badge-light-primary">In Bearbeitung</span>',
            'declined' => '<span class="badge badge-light-danger">Abgelehnt</span>',
            'failed' => '<span class="badge badge-light-danger">Fehlgeschlagen</span>',
            'refunded' => '<span class="badge badge-light-info">Rückerstattet</span>',
            'partially_refunded' => '<span class="badge badge-light-info">Teilweise Rückerstattet</span>',
            default => '<span class="badge badge-light-dark">Unbekannt</span>',
        };
    }

    public function getGrandTotalAttribute()
    {
        return $this->total + $this->shipping_cost;
    }
}
