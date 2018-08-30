<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterCreateRequest;
use App\Http\Requests\LoginRequest;
use Sentinel;

class UsersController extends Controller
{
    protected $_view = 'user-authenticate';

    public function login(){
        return view($this->_view.'/login');
    }

    public function register(){
        return view($this->_view.'/register');
    }

    public function authenticate(LoginRequest $request){
        $authenticate = Sentinel::authenticate($request->all());
        if($authenticate == false){
            return redirect()->back()->with('message', 'Wrong Username or Password');
        }
        return redirect('dashboard');
    }

    public function create(RegisterCreateRequest $request){
        Sentinel::registerAndActivate($request->all());
        return redirect('login');
    }

    public function logout(){
        Sentinel::logout();
        return redirect('login');
    }
}
