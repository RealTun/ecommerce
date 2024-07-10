<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Http\Requests\Account\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
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
      // return view('web.home.index', compact([
      //   "products" => $products,
      //   "state" => "Đăng nhập thành công"
      // ]));
      return redirect()->route('web.home')->with([
        "products" => $products,
        "state" => "Đăng nhập thành công"
      ]);
    }
    return redirect()->back()->with('error', 'Thông tin tài khoản không chính xác!');
  }

  public function logout()
  {
    Auth::logout();
    return redirect()->route('web.login')->with("state", "Đăng xuất thành công");
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

  public function updateInfo(Request $request)
  {
    $user = Auth::user();
  }

  public function updatePassword(Request $request)
  {
    $user = Auth::user();
    $user->password = Hash::make($request->password);
    $user->save();
    return redirect()->route('web.account.index')->with('success', 'Thay đổi mật khẩu thành công!');
  }

  public function index()
  {
    return view('web.account.index');
  }
  public function indexHistory()
  {
    $data = DB::table('Order')->where('user_id', Auth::user()->id)->get();
    if ($data->isEmpty()) {
      session()->flash('state', 'Bạn chưa có đơn hàng nào!');
    }
    return view('web.account.history_order', compact('data'));
  }
  public function indexOrder(string $id)
  {
    $order = DB::table('Order')->where('id', $id)->first();
    $products = DB::table('order_items')->where('order_id', $id)->get();
    return view('web.account.show', compact('order', 'products'));
  }
}
