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
        'category',  // Ensure category is fillable
        'collection', 
        'tags', 
        'sku', 
        'color', 
        'size'
    ];
}
