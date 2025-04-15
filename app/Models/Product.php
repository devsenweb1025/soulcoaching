<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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
        'options',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'decimal:2',
        'compare_price' => 'decimal:2',
        'quantity' => 'integer',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'images' => 'array',
        'options' => 'array',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->slug = Str::slug($product->name);
        });

        static::updating(function ($product) {
            if ($product->isDirty('name')) {
                $product->slug = Str::slug($product->name);
            }
        });
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the image URL attribute.
     *
     * @return string
     */
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : asset(theme()->getMediaUrlPath() . 'svg/files/blank-image.svg');
    }

    /**
     * Get the formatted price attribute.
     *
     * @return string
     */
    public function getFormattedPriceAttribute()
    {
        return 'CHF ' . number_format($this->price, 2, ',', '.');
    }

    /**
     * Get the formatted compare price attribute.
     *
     * @return string|null
     */
    public function getFormattedComparePriceAttribute()
    {
        return 'CHF ' . number_format($this->compare_price, 2, ',', '.');
    }

    /**
     * Get the discount percentage attribute.
     *
     * @return float|null
     */
    public function getDiscountPercentageAttribute()
    {
        if (!$this->compare_price) {
            return 0;
        }

        return round((($this->compare_price - $this->price) / $this->compare_price) * 100);
    }

    /**
     * Scope a query to only include active products.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to only include featured products.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope a query to only include products in stock.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInStock($query)
    {
        return $query->where('quantity', '>', 0);
    }

    /**
     * Scope a query to only include products on sale.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOnSale($query)
    {
        return $query->whereNotNull('compare_price')
            ->where('compare_price', '>', 'price');
    }

    /**
     * Check if the product is in stock.
     *
     * @return bool
     */
    public function isInStock()
    {
        return $this->quantity > 0;
    }

    /**
     * Check if the product is on sale.
     *
     * @return bool
     */
    public function isOnSale()
    {
        return $this->compare_price && $this->compare_price > $this->price;
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

    public function relatedProducts()
    {
        return $this->categories()
            ->with('products')
            ->get()
            ->pluck('products')
            ->flatten()
            ->where('id', '!=', $this->id)
            ->unique('id')
            ->take(4);
    }
}
