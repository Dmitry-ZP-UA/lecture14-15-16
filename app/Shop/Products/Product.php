<?php

namespace App\Shop\Products;

use App\Shop\Categories\Category;
use App\Shop\Images\Image;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'quantity',
        'price',
        'status',
        'slug'
    ];
    /**
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeAvailable(Builder $query)
    {
        return $query->where('status', true);
    }
    public function scopeBySlug(Builder $query, string $slug)
    {
        return $query->where('slug', $slug);
    }
//    public function images()
//    {
//        return $this->morphMany(Image::class, 'imageable');
//    }
//    public function getCoverAttribute()
//    {
//        return $this->images()->first()->src;
//    }
    /**
     * @param string $name
     */
    public function setNameAttribute(string $name)
    {
        $this->attributes['name'] = strtolower($name);
        $this->attributes['slug'] = str_slug($this->name);
    }
    /**
     * @return string
     */
    public function getFormattedNameAttribute()
    {
        return ucfirst($this->name);
    }
    /**
     * @param string $price
     */
    public function setPriceAttribute(string $price)
    {
        $this->attributes['price'] = bcmul($price, 100);
    }
    /**
     * @return string
     */
    public function getFormattedPriceAttribute()
    {
        return '$ ' . number_format(($this->price / 100), 2, ',', ' ');
    }
    /**
     * @param string $description
     */
    public function setDescriptionAttribute(string $description)
    {
        $this->attributes['description'] = trim($description);
    }

}
