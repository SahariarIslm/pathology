<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class MonthlyCheckin extends Model
{
    protected $table = 'monthly_checkins';

    protected $fillable = ['invoice' ,'date' , 'time', 'vehicle_number', 'vehicle_category','name' , 'phone','payment_status' , 'checkin','checkout','status','shop'];
    public function vehicleCategory()
    {
        return $this->belongsTo('App\Admin\VehicleCategory');
    }
}
