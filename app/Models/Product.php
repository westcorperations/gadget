<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
 protected  $table = "product";
 protected $fillable = [
     'name',
     'category_id',
     'small_description',
     'description',
     'original_price',
     'selling_price',
     'quantity',
     'tax',
     'image',
     'status',
     'trending',
     'meta_title',
     'meta_keyword',
     'mata_description',
 ];

 public function category()
 {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    
 }
}
