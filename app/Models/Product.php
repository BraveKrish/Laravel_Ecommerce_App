<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    // protected $table = 'products';

    protected $fillable = [
       'name','category_id','description','is_featured','price','featured_image','qty','sale_price','status'
    ];

    //realtion
    public function category(){
        return $this->belongsTo(ProductCategory::class,'category_id');
    }
}
