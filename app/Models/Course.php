<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'compare_price',
        'image',
        'images',
        'is_featured',
        'is_active',
        'start_date',
        'end_date',
        'max_participants',
        'current_participants',
        'location',
        'duration',
        'requirements',
        'materials'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'compare_price' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'images' => 'array',
        'requirements' => 'array',
        'materials' => 'array'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($course) {
            $course->slug = Str::slug($course->title);
        });

        static::updating(function ($course) {
            if ($course->isDirty('title')) {
                $course->slug = Str::slug($course->title);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getFormattedPriceAttribute()
    {
        return 'CHF ' . number_format($this->price, 2, ',', '.');
    }

    public function getFormattedComparePriceAttribute()
    {
        return 'CHF ' . number_format($this->compare_price, 2, ',', '.');
    }

    public function getDiscountPercentageAttribute()
    {
        if (!$this->compare_price) {
            return 0;
        }

        return round((($this->compare_price - $this->price) / $this->compare_price) * 100);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('start_date', '>', now());
    }

    public function scopeAvailable($query)
    {
        return $query->where(function ($q) {
            $q->whereNull('max_participants')
                ->orWhereColumn('current_participants', '<', 'max_participants');
        });
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'bookings')
            ->withPivot('status', 'created_at')
            ->withTimestamps();
    }
}
