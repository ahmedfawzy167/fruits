<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = ['Name','Description','category_id','Image','Price'];


    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
