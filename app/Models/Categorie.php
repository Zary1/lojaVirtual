<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    //
    protected $fillable = ['category_name', 'codigo', 'description'];

    protected $table = 'categories'; 
}
