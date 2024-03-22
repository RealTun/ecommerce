<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductBrand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

class WebController extends Controller
{
  public function index()
  {
    $products = Product::limit(20)->get();
    return view('web.home.index', compact('products'));
  }

  public function brandIndex(string $slug)
  {
    $brand = ProductBrand::where('slug', $slug)->first();
    return view('web.products.index', compact('brand'));
  }

  public function detailsProduct(string $slug, string $id)
  {
    $product = Product::find($id);
    $product_size = DB::table('product')
      ->join('product_inventory', 'product.id', '=', 'product_inventory.product_id')
      ->where('product_id', $id)
      ->get();
    return view('web.products.detail', compact('product', 'product_size'));
  }

  public function addToCart()
  {
    $data = json_decode(stripslashes($_POST['data_p']));
    $current_session = DB::table('shopping_session')
      ->join('user', 'user.id', '=', 'shopping_session.user_id')
      ->where('user.id', Auth::user()->id)
      ->value('shopping_session.id');

    // check exist item in cart
    $exist = DB::table('cart_item')
      ->where([
        'product_id' => $data->id,
        'size' => $data->size
      ])
      ->exists();

    if ($exist) {
      $current_quantity = DB::table('cart_item')
        ->where(['product_id' => $data->id, 'size' => $data->size])
        ->value('quantity');
      // update quantity item cart                    
      DB::table('cart_item')
        ->where(['product_id' => $data->id, 'size' => $data->size])
        ->update(['quantity' => $current_quantity + $data->quantity]);
    } else {
      // create cart_item 

      DB::table('cart_item')->insert([
        'session_id' => $current_session,
        'product_id' => $data->id,
        'size' => $data->size,
        'quantity' => $data->quantity,
      ]);
    }

    $product_cart = DB::table('cart_item')
      ->join('product', 'product.id', '=', 'cart_item.product_id')
      ->where('cart_item.session_id', $current_session)
      ->get();
    // response
    return response()->json($product_cart);
  }

  public function showItemCart()
  {
    if (Auth::check()) {
      $current_session = DB::table('shopping_session')
        ->join('user', 'user.id', '=', 'shopping_session.user_id')
        ->where('user.id', Auth::user()->id)
        ->value('shopping_session.id');

      $product_cart = DB::table('cart_item')
        ->join('product', 'product.id', '=', 'cart_item.product_id')
        ->where('cart_item.session_id', $current_session)
        ->get();
      return response()->json($product_cart);
    }
    return response()->json([]);
  }

  public function deleteItemCart(Request $request)
  {
    $id = $request->input('id');
    $size = $request->input('size');
    DB::table('cart_item')->where(['product_id' => $id, 'size' => $size])->delete();
    return response('Xoá sản phẩm khỏi giỏ thành công!');
  }

  public function contact()
  {
    return view('web.home.contact');
  }

  public function sendContact(Request $request)
  {
  }

  public function sendMail()
  {
    $mail = new SendEmail();
    Mail::to('dotuan458@gmail.com')->send($mail);
  }
}
