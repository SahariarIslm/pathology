<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'deliveries';

    public function parkingPrices()
    {
        return $this->hasMany(ParkingPrice::class);
    }
}
