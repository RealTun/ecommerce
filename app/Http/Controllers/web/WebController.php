<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductBrand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class WebController extends Controller
{
  public function index()
  {
    $products = Product::limit(20)->get();
    foreach ($products as $each) {
      $each->path = DB::table('image')->join('product', 'product_id', '=', 'product.id')
        ->where('product_id', '=', $each->id)
        ->value('path');
    }
    return view('web.home.index', compact('products'));
  }

  public function brandProducts(string $slug, int $pageNumber = 1)
  {
    if($pageNumber < 1){
      return back()->with('error', "Yêu cầu không hợp lệ!");
    }

    // get data
    $brand = ProductBrand::where('slug', $slug)->first();
    $products = $brand->products();

    // pagination
    $pageSize = 12;
    $skipSize = ($pageNumber-1) * $pageSize;
    $count_page = ceil($brand->products()->count() / $pageSize);
    $products = $products->skip($skipSize)->take($pageSize)->get();
    foreach($products as $each){
      $each->path = DB::table('image')->join('product', 'product_id', '=', 'product.id')
        ->where('product_id', '=', $each->id)
        ->value('path');
    }
    return view('web.products.index', compact('brand', 'products', 'count_page', 'pageNumber'));
  }

  public function detailsProduct(string $slug, string $id)
  {
    $product = Product::find($id);
    $product_images = DB::table('image')->join('product', 'product_id', '=', 'product.id')
      ->where('product_id', '=', $id)
      ->get();
    $product_size = DB::table('product')
      ->join('product_inventory', 'product.id', '=', 'product_inventory.product_id')
      ->where('product_id', $id)
      ->get();
    return view('web.products.detail', compact('product', 'product_size', 'product_images'));
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
    foreach($product_cart as $each){
      if ($each->sale == 0) {
        $each->price = $each->price * 3000;
      } else {
        $adjustPrice = $each->price * 3000;
        $priceAfterSale = $adjustPrice - ($adjustPrice * ($each->sale / 100));
        $each->price = $priceAfterSale;
      }

      $each->price = ceil($each->price / 1000) * 1000;
      if ($each->quantity != 0)
        $each->totalPrice = $each->quantity * $each->price;

      $each->price = number_format($each->price, 0, ',', '.') . ' VNĐ';
      $each->totalPrice = number_format($each->totalPrice, 0, ',', '.') . ' VNĐ';
    }
    // response
    return response()->json($product_cart);
  }

  public function showItemCart()
  {
    if (Auth::check()) {
      $product_cart = DB::table('cart_item')
        ->join('product', 'product.id', '=', 'cart_item.product_id')
        ->join('shopping_session', 'shopping_session.id', '=', 'cart_item.session_id')
        ->where('user_id', Auth::user()->id)
        ->get();

      foreach ($product_cart as $each) {
        if ($each->sale == 0) {
          $each->price = $each->price * 3000;
        } else {
          $adjustPrice = $each->price * 3000;
          $priceAfterSale = $adjustPrice - ($adjustPrice * ($each->sale / 100));
          $each->price = $priceAfterSale;
        }

        $each->price = ceil($each->price / 1000) * 1000;
        if ($each->quantity != 0)
          $each->totalPrice = $each->quantity * $each->price;

        $each->price = number_format($each->price, 0, ',', '.') . ' VNĐ';
        $each->totalPrice = number_format($each->totalPrice, 0, ',', '.') . ' VNĐ';
      }
    } else {
      $product_cart = [];
    }
    return response()->json($product_cart);
  }

  public function deleteItemCart(Request $request)
  {
    $id = $request->input('id');
    $size = $request->input('size');
    DB::table('cart_item')->where(['product_id' => $id, 'size' => $size])->delete();
    return response('Xoá sản phẩm khỏi giỏ thành công!');
  }

  public function showCheckout()
  {
    $id = Auth::user()->id;
    $totalPrice = 0;
    $data = DB::table('cart_item')
      ->join('product', 'product.id', '=', 'cart_item.product_id')
      // ->join('image', 'product.id', '=', 'image.product_id')
      ->join('shopping_session', 'shopping_session.id', '=', 'cart_item.session_id')
      ->where('user_id', $id)
      ->get();
    foreach ($data as $each) {
      $each->slug = DB::table('product_brand')
        ->join('product', 'product_brand.id', '=', 'product.brand_id')
        ->where('product.id', $each->product_id)
        ->value('slug');

      if ($each->sale == 0) {
        $each->price = $each->price * 3000;
      } else {
        $adjustPrice = $each->price * 3000;
        $priceAfterSale = $adjustPrice - ($adjustPrice * ($each->sale / 100));
        $each->price = $priceAfterSale;
      }

      $each->price = ceil($each->price / 1000) * 1000;
      if ($each->quantity != 0)
        $each->totalPrice = $each->quantity * $each->price;
      $each->productIdFormatted = strlen($each->product_id) == 1 ? '00' . $each->product_id : '0' . $each->product_id;
      $each->priceFormatted  = number_format($each->price, 0, ',', '.') . ' VNĐ';
      $each->totalPriceFormatted = number_format($each->totalPrice, 0, ',', '.') . ' VNĐ';
      $totalPrice += $each->totalPrice;
    }
    $totalPriceFormatted = number_format($totalPrice, 0, ',', '.') . ' VNĐ';
    return view('web.cart.checkout', compact('data', 'totalPriceFormatted'));
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
    $mail = new SendMail();
    $product_cart = DB::table('cart_item')
        ->join('product', 'product.id', '=', 'cart_item.product_id')
        ->join('shopping_session', 'shopping_session.id', '=', 'cart_item.session_id')
        ->where('user_id', Auth::user()->id)
        ->get();
    if(!count($product_cart)){
      return redirect()->back()->with('error', "Giỏ hàng của bạn đang trống!");
    }
    $totalPrice = 0;
    foreach($product_cart as $item){
      if ($item->sale == 0) {
        $item->price = $item->price * 3000;
      } else {
        $adjustPrice = $item->price * 3000;
        $item->price = $adjustPrice - ($adjustPrice * ($item->sale / 100));
      }
      $item->price = ceil($item->price / 1000) * 1000;
      if ($item->quantity != 0)
        $item->totalPrice = $item->quantity * $item->price;
      $item->productIdFormatted = strlen($item->product_id) == 1 ? '00' . $item->product_id : '0' . $item->product_id;
      $item->priceFormatted  = number_format($item->price, 0, ',', '.') . ' VNĐ';
      $item->totalPriceFormatted = number_format($item->totalPrice, 0, ',', '.') . ' VNĐ';
      $totalPrice += $item->totalPrice;
    }
    $totalPriceFormatted = number_format($totalPrice, 0, ',', '.') . ' VNĐ';
    $mail->with(['data' => $product_cart, 'total' => $totalPriceFormatted]);
    Mail::to(Auth::user()->email)->send($mail);
    DB::table('cart_item')
        ->join('product', 'product.id', '=', 'cart_item.product_id')
        ->join('shopping_session', 'shopping_session.id', '=', 'cart_item.session_id')
        ->where('user_id', Auth::user()->id)
        ->delete();
    return redirect()->back()->with('success', "Bạn đã đặt hàng thành công! Vui lòng kiểm tra email!");
  }
}
