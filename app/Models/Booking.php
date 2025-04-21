<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'course_id',
        'status',
        'amount',
        'payment_method',
        'payment_status',
        'transaction_id',
        'notes',
        'additional_data'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'additional_data' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function getFormattedAmountAttribute()
    {
        return '@chf(' . $this->amount . ')';
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    public function scopeCancelled($query)
    {
        return $query->where('status', 'cancelled');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopePaid($query)
    {
        return $query->where('payment_status', 'paid');
    }

    public function scopePendingPayment($query)
    {
        return $query->where('payment_status', 'pending');
    }

    public function confirm()
    {
        $this->update(['status' => 'confirmed']);
    }

    public function cancel()
    {
        $this->update(['status' => 'cancelled']);
    }

    public function complete()
    {
        $this->update(['status' => 'completed']);
    }

    public function markAsPaid($transactionId = null)
    {
        $this->update([
            'payment_status' => 'paid',
            'transaction_id' => $transactionId
        ]);
    }

    public function markAsFailed()
    {
        $this->update(['payment_status' => 'failed']);
    }

    public function refund()
    {
        $this->update(['payment_status' => 'refunded']);
    }
}
