<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
class Product extends Model
{
    protected $table = "products";

    protected $fillable = [
        'id',
        'category_id',
        'name',
        'title',
        'meta_description',
        'slug',
        'price',
        'stock',
        'type',
        'img',
        'description'
    ];

    public $timestamps = true;

    

    public function getImageUrlAttribute()
{
    // If image column exists and is not empty
    if (!empty($this->image)) {
        // If already a full URL (e.g., from external source)
        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        }

        // If stored locally in /storage/app/public/
        return asset('storage/' . $this->image);
    }

    // Fallback image if none is set
    return asset('images/no-image.jpg');
}

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'product_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    
    public function getRouteKeyName()
{
    return 'slug';
}
// Product.php
protected static function booted()
{
    static::created(function () {
        Cache::forget('all_products');
    });

    static::updated(function () {
        Cache::forget('all_products');
    });

    static::deleted(function () {
        Cache::forget('all_products');
    });
}


}
