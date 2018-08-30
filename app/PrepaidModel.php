<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrepaidModel extends Model
{
    protected $table = 'prepaid';

    protected $fillable = [
        'order_number',
        'phone_number',
        'value_order',
        'total_order',
        'state'
    ];

    public $timestamps = true;

    public function scopeCreatePrepaid($query,$data){
        $randnum = rand(100000000,999999999);
        $rand2 = rand(1,9);
        $totalRand = $rand2.$randnum;
        $totalOrder = ((int)$data['value'] * 5)/100;
        $totalOrder = (int)$data['value'] + $totalOrder;
        $arrayData = [
            'order_number'  => $totalRand,
            'phone_number'  => $data['mobile'],
            'value_order'   => $data['value'],
            'total_order'   => $totalOrder ,
            'state'         => '1'
        ];
        $createData = $query->create($arrayData);
        return $arrayData;
    }
}
