<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    protected $fillable = ['code','value','banner_url','expires_at','usages_limit','used_count'];
}
