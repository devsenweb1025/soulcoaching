<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'event_date',
        'start_time',
        'end_time',
        'zoom_link',
        'category',
        'category_color',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'event_date' => 'date',
        'start_time' => 'string',
        'end_time' => 'string',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('event_date', '>=', now()->startOfDay());
    }

    public function scopeLatest($query, $limit = 4)
    {
        return $query->upcoming()->orderBy('event_date', 'asc')->limit($limit);
    }

    public function getFormattedDateAttribute()
    {
        return $this->event_date->format('j. F Y');
    }

    public function getFormattedTimeAttribute()
    {
        $start = $this->start_time ? substr($this->start_time, 0, 5) : '';
        $end = $this->end_time ? substr($this->end_time, 0, 5) : '';
        
        if ($start && $end) {
            return $start . ' Uhr - ' . $end . ' Uhr';
        }
        
        return $start ? $start . ' Uhr' : '';
    }
}
