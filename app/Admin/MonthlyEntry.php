<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class MonthlyEntry extends Model
{
     protected $table = 'monthly_entries';

    protected $fillable = ['invoice' ,'date' ,'end_date' , 'time', 'vehicle_number','name', 'vehicle_category_id','customer_id','vehicle_category' , 'price', 'mobile','payment_status','status','shop'];

    public function vehicleCategory()
    {
        return $this->belongsTo('App\Admin\VehicleCategory');
    }
    public function Customer()
    {
        return $this->belongsTo('App\Admin\Customer');
    }
}
