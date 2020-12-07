<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ParkingPrice extends Model
{
    protected $table = 'parking_prices';

    protected $fillable = ['delivery_id' ,'parking_group_id' , 'vehicle_category_id', 'price', 'penalty', 'details','status', 'shop' ];

    public function delivery()
    {
        return $this->belongsTo('App\Admin\Delivery');
    }

    public function parkingGroup()
    {
        return $this->belongsTo('App\Admin\ParkingGroup');
    }

    public function vehicleCategory()
    {
        return $this->belongsTo('App\Admin\VehicleCategory');
    }
}
