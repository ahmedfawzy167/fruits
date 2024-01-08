<?php

namespace App\Models;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable =["id","user_id","product_id","status"];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

  


}
