<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'name',
        'price',
        'quantity',
        'options',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'options' => 'array',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function getTotalAttribute(): float
    {
        return $this->price * $this->quantity;
    }

    public function getProductTypeAttribute(): string
    {
        if (isset($this->options['download_link'])) {
            return 'course';
        } else if (isset($this->options['duration'])) {
            return 'service';
        }
        return 'product';
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'product_id', 'id');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'product_id', 'id');
    }
}