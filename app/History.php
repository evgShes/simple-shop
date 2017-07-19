<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'user_id',
        'prod_qty',
        'prod_name',
        'prod_price',
    ];
}
