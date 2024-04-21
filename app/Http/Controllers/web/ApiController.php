<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function getProducts(){
        $products = Product::all();
        return response()->json($products);
    }

    public function getProduct(string $id){
        $product = Product::find($id);
        return response()->json($product);
    }

    public function getUsers(){
        $users = User::all();
        return response()->json($users);
    }

    public function getUser(string $id){
        $user = User::find($id);
        return response()->json($user);
    }
}
