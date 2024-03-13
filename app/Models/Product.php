<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;

  protected $table = 'product';

  public function brand()
  {
    return $this->belongsTo(ProductBrand::class, 'brand_id', 'id');
  }

  public function old_price()
  {
    $price = $this->price * 3 . '.000đ';
    return $price;
  }

  public function new_price()
  {
    $price = $this->price * 2 . '.000đ';
    return $price;
  }
  /* public function getPriceAttribute($value)
  {
    $price = $value * 3000;
    return number_format($price, ($price == (int)$price) ? 0 : 2, ',', '.') . ' VNĐ';
  }
  public function getPriceAfterSaleAttribute($value)
  {
    return number_format($value, ($value == (int)$value) ? 0 : 2, ',', '.') . ' VNĐ';
  }
  public function setSaleAttribute($value)
  {
    $this->attributes['sale'] = (float)$value;
  } */
}
