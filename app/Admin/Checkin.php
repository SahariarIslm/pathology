<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    protected $table = 'checkins';

    protected $fillable = ['invoice' ,'datetime', 'vehicle_number', 'vehicle_category_id', 'customer_id','parking_group_id', 'price','monthly_price','penalty','phone','checkin','checkout','status','shop'];

}
