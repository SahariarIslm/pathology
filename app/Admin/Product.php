<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['user_id' ,'code' , 'name', 'category_id', 'unit', 'room', 'minimum', 'maximum', 'mrp','discount', 'price', 'status', 'shop' ];

    public function category()
    {
        return $this->belongsTo('App\Admin\Category');
    }
}
