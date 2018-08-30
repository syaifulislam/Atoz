<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PrepaidCreateRequest;
use App\PrepaidModel;

class PrepaidController extends Controller
{
    protected $_view = 'prepaid-balance';

    protected $_route = 'prepaid-balance';

    public function index(){
        return view($this->_view.'/index');
    }

    public function create(PrepaidCreateRequest $request){
        $data = PrepaidModel::CreatePrepaid($request->all());
        return redirect($this->_route.'/result/'.$data['order_number']);
    }

    public function result($orderNumber){
        $data = PrepaidModel::where('order_number',$orderNumber)->first();
        return view($this->_view.'/result',compact('data'));
    }
}
