<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Http\Requests\Account\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
  //
  public function login()
  {
    return view('web.auth.login');
  }

  public function checkLogin(Request $request)
  {
    if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
      $products = Product::limit(20)->get();
      foreach ($products as $each) {
        $each->path = DB::table('image')->join('product', 'product_id', '=', 'product.id')
          ->where('product_id', '=', $each->id)
          ->value('path');
      }
      $exist_shopping_session = DB::table('shopping_session')
        ->join('user', 'user.id', '=', 'shopping_session.user_id')
        ->where('user.id', Auth::user()->id)
        ->exists();
      if (!$exist_shopping_session) {
        DB::table('shopping_session')->insert([
          'user_id' => Auth::user()->id,
        ]);
      }
      return view('web.home.index', compact('products'));
    }
    return redirect()->back()->with('error', 'Thông tin tài khoản không chính xác!');
  }

  public function logout()
  {
    Auth::logout();
    return redirect()->route('web.login');
  }

  public function register()
  {
    return view('web.auth.register');
  }

  public function storeAccount(RegisterRequest $request)
  {
    $account = new User();
    $account->fill($request->validated());
    $account->save();
    return redirect()->route('web.login')->with('success', 'Đăng ký tài khoản thành công!');
  }

  public function forgotPassword()
  {
  }
}
