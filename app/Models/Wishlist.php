<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = [
        'user_id','product_id'
    ];

    // relationships
    public function wishlistedBy(){
        return $this->belongsToMany(User::class,'wishlists');
    }

}
