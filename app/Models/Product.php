<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    
    protected $fillable=['name','image','description','price','categorie_id',
    'is_on_sale','discount_percentage'];
    protected $table='products';

    
}
