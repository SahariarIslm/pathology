<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class VehicleCategory extends Model
{
    protected $table = 'vehicle_categories';

    protected $fillable = ['name' ,'details' , 'status', 'shop'];

    public function parkingClient()
    {
        return $this->hasMany('App\Admin\Customer');
    }

    public function parkingPrices()
    {
        return $this->hasMany('App\Admin\ParkingPrice');
    }

    public function hourlyEntries()
    {
        return $this->hasMany('App\Admin\HourlyEntry');
    }

    public function monthlyEntries()
    {
        return $this->hasMany('App\Admin\MonthlyEntry');
    }
}
