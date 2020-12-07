<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class MedicineType extends Model
{
    protected $table = 'medicine_types';

    public function products()
    {
        return $this->hasMany('App\Admin\Product');
    }
}
