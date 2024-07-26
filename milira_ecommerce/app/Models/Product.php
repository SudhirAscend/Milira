<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

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
        'size',
        'price', // Add price here
        'stocks', // Add stocks here
        'featured',
    ];
    
    
    protected $casts = [
        'images' => 'array',
    ];
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
    public function cartDetails()
    {
        return $this->hasMany(CartDetail::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
