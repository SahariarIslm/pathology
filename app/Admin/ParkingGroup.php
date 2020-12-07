<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ParkingGroup extends Model
{
    protected $table = 'parking_groups';

    protected $fillable = ['name' ,'details' , 'status', 'shop'];

    public function parkingPrices()
    {
        return $this->hasMany(ParkingPrice::class);
    }
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
