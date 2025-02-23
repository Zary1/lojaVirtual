<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categorie;

class Product extends Model
{
    //
    
    protected $fillable=['name','image','description','price','categorie_id',
    'is_on_sale','discount_percentage'];
    protected $table='products';

    // relacao muitos para um
    public function category(){
        return $this->belongsTo(Categorie::class,'categorie_id');
    }

    
}
