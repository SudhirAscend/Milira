<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 
        'small_description', 
        'description', 
        'images', 
        'category', 
        'collection', 
        'tags', 
        'sku', 
        'color', 
        'size'
    ];

    /**
     * Get the category that the product belongs to.
     * Assuming you have a Category model and a relationship setup
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
