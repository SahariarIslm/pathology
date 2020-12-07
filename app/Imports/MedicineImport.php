<?php

namespace App\Imports;

use App\Admin\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Auth;

class MedicineImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user_id = Auth::user()->id;
        return new Product([
            'user_id'            => $user_id,
            'barcode'            => $row[0],
            'name'               => $row[1],
            'category'           => $row[2],
            'medicine_shelf'     => $row[3],
            'strength'           => $row[4],
            'medicine_unit'      => $row[5],
            'generic_name'       => $row[6],
            'medicine_type'      => $row[7],
            'seller_price'       => $row[8],
            'manufacturer'       => $row[9],
            'manufacturer_price' => $row[10],
            'shop'               => $row[11],
        ]);
    }
}
