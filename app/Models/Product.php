<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sku', 'short_description', 'description', 'price', 'discount', 'status', 'category_id', 'subcategory_id', 'thumbnail', 'gallary', 'certificate'];
}
