<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
  //
  public function index()
  {
    $products = Product::all();
    return view('admin.products.index', compact('products'));
  }

  public function create()
  {
    return view('admin.products.add', compact('categories'));
  }

  public function store(Request $request)
  {
    $this->validate(
      $request,
      [
        'title' => 'required',
        'description' => 'required',
        'content' => 'required',
        'image' => 'required',
        'category_id' => 'required',
      ]
    );


    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $name_file = $file->getClientOriginalName();
      $extension = $file->getClientOriginalExtension();
      if (
        strcasecmp($extension, 'jpg') === 0
        || strcasecmp($extension, 'png' === 0)
        || strcasecmp($extension, 'jpeg') === 0
      ) {
        $image = time() . '_' . $name_file;

        $file->move(public_path('image/Product/'), $image);
      }
    }

    Product::create([
      "title" => $request->title,
      "description" => $request->description,
      "content" => $request->get('content'),
      "image" => $image,
      "view_counts" => 0,
      "user_id" => 1,
      "category_id" => $request->category_id,
      "new_Product" => $request->new_Product ? 1 : 0,
      "highlight_Product" => $request->highlight_Product ? 1 : 0,
    ]);

    return redirect()->route('admin.Products.index');
  }

  public function edit(string $id)
  {
    $product = Product::find($id);
    return view('admin.products.edit', compact('product', 'categories'));
  }

  public function update(Request $request, string $id)
  {
    $this->validate(
      $request,
      [
        'title' => 'required',
        'description' => 'required',
        'content' => 'required',
        'category_id' => 'required',
      ]
    );

    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $name_file = $file->getClientOriginalName();
      $extension = $file->getClientOriginalExtension();
      if (
        strcasecmp($extension, 'jpg') === 0
        || strcasecmp($extension, 'png' === 0)
        || strcasecmp($extension, 'jpeg') === 0
      ) {
        $image = time() . '_' . $name_file;

        $file->move(public_path('image/Product/'), $image);
      }
    }

    $Product = Product::find($id);
    $Product->update([
      "title" => $request->title,
      "description" => $request->description,
      "content" => $request->get('content'),
      "image" => isset($image) ? $image : $Product->image,
      "category_id" => $request->category_id,
      "new_Product" => $request->new_Product ? 1 : 0,
      "highlight_Product" => $request->highlight_Product ? 1 : 0,
    ]);

    return redirect()->route('admin.Products.index');
  }

  public function delete(string $id)
  {
    $Product = Product::find($id);
    $Product->delete();
    return redirect()->route('admin.Products.index');
  }
}
