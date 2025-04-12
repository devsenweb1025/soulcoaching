<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'compare_price',
        'quantity',
        'sku',
        'barcode',
        'image',
        'images',
        'is_featured',
        'is_active',
        'options'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'compare_price' => 'decimal:2',
        'images' => 'array',
        'options' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeInStock($query)
    {
        return $query->where('quantity', '>', 0);
    }

    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 2);
    }

    public function getFormattedComparePriceAttribute()
    {
        return $this->compare_price ? number_format($this->compare_price, 2) : null;
    }

    public function getDiscountPercentageAttribute()
    {
        if (!$this->compare_price) {
            return 0;
        }
        return round((($this->compare_price - $this->price) / $this->compare_price) * 100);
    }

    public function getMainImageAttribute()
    {
        return $this->image ?? ($this->images ? $this->images[0] : null);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function scopeInCategory($query, $category)
    {
        return $query->whereHas('categories', function ($q) use ($category) {
            $q->where('categories.id', $category->id);
        });
    }
}
