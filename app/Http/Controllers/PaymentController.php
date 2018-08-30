<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PrepaidModel;
use App\ProductModel;
use Carbon\Carbon;

class PaymentController extends Controller
{
    protected $_view = 'payment';

    public function index(){
        return view($this->_view.'/index');
    }

    public function submit(Request $request){
        $hoursJakarta = Carbon::now()->setTimezone('Asia/Jakarta')->format('H');
        $rand = rand(1,100);
        if($request->get('id')){
            $orderNumber = $request->get('id');
        }else{
            $orderNumber = $request->input('order_number');
        }
        $checkPrepaid = PrepaidModel::where('order_number',$orderNumber)->first();
        if(! $checkPrepaid){
            $checkProduct = ProductModel::where('order_number',$orderNumber)->first();
            $codeRandom = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ', 8)), 0, 8);
            if(! $checkProduct){
                return redirect()->back()->with('message', 'Order Number did not match');
            }else{
                if($checkProduct->state == '2'){
                    return redirect()->back()->with('message', 'This Order Has Been Paid');
                }
                ProductModel::where('order_number',$orderNumber)->update(['state'=>'2','shipping_code'=>$codeRandom]);
                return redirect()->back()->with('message', 'Success');
            }
        }else{
            if($checkPrepaid->state == '4'){
                return redirect()->back()->with('message', 'This Order Has Been Cancelled');
            }
            $hourServer = Carbon::now();
            $createdHour = Carbon::parse($checkPrepaid->created_at);
            $diffInMinutes = $createdHour->diffInMinutes($hourServer);
            if($diffInMinutes >= 6){
                PrepaidModel::where('order_number',$orderNumber)->update(['state'=>'4']);
                return redirect()->back()->with('message', 'This Order Has Been Cancelled');
            }
            if($checkPrepaid->state == '2'){
                return redirect()->back()->with('message', 'This Order Has Been Paid');
            }
            if($hoursJakarta >= 9 && $hoursJakarta <= 17){
                if($rand <= 90){
                    PrepaidModel::where('order_number',$orderNumber)->update(['state'=>'2']);
                    return redirect()->back()->with('message', 'Success'); 
                }else{
                    PrepaidModel::where('order_number',$orderNumber)->update(['state'=>'3']);
                    return redirect()->back()->with('message', 'Fail');
                }
            }else{
                if($rand <= 40){
                    PrepaidModel::where('order_number',$orderNumber)->update(['state'=>'2']);
                    return redirect()->back()->with('message', 'Success'); 
                }else{
                    PrepaidModel::where('order_number',$orderNumber)->update(['state'=>'3']);
                    return redirect()->back()->with('message', 'Fail');                
                }
            }
        }
    }
}
