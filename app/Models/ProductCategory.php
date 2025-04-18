<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = [
        'title','image','status'
    ];

    // relation
    public function products(){
        return $this->hasMany(Product::class);
    }

}
