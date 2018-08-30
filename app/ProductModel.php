<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'product';

    protected $fillable = [
        'order_number',
        'product',
        'address',
        'price',
        'total_price',
        'state'
    ];

    public $timestamps = true;

    public function scopeCreateProduct($query,$data){
        $randnum = rand(100000000,999999999);
        $rand2 = rand(1,9);
        $totalRand = $rand2.$randnum;
        $totalOrder = (int)$data['price'] + 10000;
        $arrayData = [
            'order_number'  => $totalRand,
            'product'  => $data['product'],
            'address'   => $data['shipping'],
            'price'   => $data['price'],
            'total_price' => $totalOrder,
            'state'     => '1'
        ];
        $createData = $query->create($arrayData);
        return $arrayData;
    }
}
