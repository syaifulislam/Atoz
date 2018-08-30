<?php

namespace App\Http\Controllers;

use App\PrepaidModel;
use App\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class OrderController extends Controller
{
    protected $_view = 'order';

    public function index(Request $request){
        $dataArray = [];
        $getProduct = new ProductModel;
        $getPrepaid = new PrepaidModel;
        if($request->get('id')){
            $getProduct = $getProduct->where('order_number',$request->get('id'));
            $getPrepaid = $getPrepaid->where('order_number',$request->get('id'));
        }
        foreach($getProduct->get() as $value){
            $stats = 'Pay';
            if($value->state == 2){
                $stats = 'Shipping Code : '.$value->shipping_code;
            }else if($value->state == 3){
                $stats = 'Fail';
            }else if($value->state == 4){
                $stats = 'Canceled';
            }
            $array = [
                'type'=>'product',
                'order_no'=>$value->order_number,
                'description'=>$value->product.' that cost '.$value->total_price,
                'total'=>$value->total_price,
                'information'=>$value->state,
                'code'=>$stats
            ];
            array_push($dataArray,$array);
        }
        foreach($getPrepaid->get() as $value){
            $stats = 'Pay';
            if($value->state == 2){
                $stats = 'Success';
            }else if($value->state == 3){
                $stats = 'Fail';
            }else if($value->state == 4){
                $stats = 'Canceled';
            }
            $array = [
                'type'=>'prepaid',
                'order_no'=>$value->order_number,
                'description'=>$value->value_order.' to '.$value->phone_number,
                'total'=>$value->total_order,
                'information'=>$value->state,
                'code'=>$stats
            ];
            array_push($dataArray,$array);
        }
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $itemCollection = collect($dataArray);
        $perPage = 20;
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedItems = new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
        $paginatedItems->setPath($request->url());
        $dataArray = $paginatedItems;
        return view($this->_view.'/index',compact('dataArray'));
    }
}
