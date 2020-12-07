<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class MedicineUnit extends Model
{
    protected $table = 'medicine_units';
    
    public function products()
    {
        return $this->hasMany('App\Admin\Product');
    }
}
