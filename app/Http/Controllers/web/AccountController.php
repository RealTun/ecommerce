<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class AccountController extends Controller
{
    //
    public function login(){
        return view('web.auth.login');
    }

    public function checkLogin(Request $request){
        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            $products = Product::limit(20)->get();
            return view('web.home.index', compact('products'));
        }
        return redirect()->back()->with('error', 'Thông tin tài khoản không chính xác!');
    }

    public function logout(){
        Auth::logout();
        $products = Product::limit(20)->get();
        return view('web.home.index', compact('products'));
    }

    public function register(){
        return view('web.auth.register');
    }

    public function storeAccount(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'telephone' => 'required|numeric',
            'email' => 'required',
            'password' => 'required',
            'cf-password' => 'required',
        ]);
    }

    public function forgotPassword(){

    }
}
