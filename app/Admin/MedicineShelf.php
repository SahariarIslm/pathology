<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class MedicineShelf extends Model
{
    protected $table = 'medicine_shelves';

    public function products()
    {
        return $this->hasMany('App\Admin\Product');
    }
}
