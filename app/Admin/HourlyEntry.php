<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class HourlyEntry extends Model
{
    protected $table = 'hourly_entries';

    protected $fillable = ['invoice' ,'date' , 'time', 'vehicle_number', 'vehicle_category_id', 'price','penalty', 'phone','checkin','checkout','status','shop'];

    public function vehicleCategory()
    {
        return $this->belongsTo('App\Admin\VehicleCategory');
    }

}
