<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'session_id', 'product_id', 'quantity'];

    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeFavoriteItems($query)
    {
        return $query->where('type', 'favorite');
    }
    public function scopeCartItems($query)
    {
        return $query->where('type', 'cart');
    }
}
