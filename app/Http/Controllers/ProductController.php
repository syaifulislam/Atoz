<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductCreateRequest;
use App\ProductModel;

class ProductController extends Controller
{
    protected $_view = 'product';

    protected $_route = 'product';

    public function index(){
        return view($this->_view.'/index');
    }

    public function create(ProductCreateRequest $request){
        $data = ProductModel::CreateProduct($request->all());
        return redirect($this->_route.'/result/'.$data['order_number']);
    }

    public function result($id){
        $data = ProductModel::where('order_number',$id)->first();
        return view($this->_view.'/result', compact('data'));
    }
}
