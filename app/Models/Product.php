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
  public function getPriceAttribute($value)
  {
    $adjustedPrice = $value * 3000;
    $roundedPrice = ceil($adjustedPrice / 1000) * 1000;
    return number_format($roundedPrice, 0, ',', '.') . ' VNĐ';
  }

  public function getPriceAfterSaleAttribute()
  {
    if ($this->attributes['sale'] != 0) {
      $adjustPrice = ceil($this->attributes['price'] * 3000 / 1000) * 1000;
      $priceAfterSale = $adjustPrice - ($adjustPrice * ($this->attributes['sale'] / 100));
      $roundedPriceAfterSale = ceil($priceAfterSale / 1000) * 1000;
      return number_format($roundedPriceAfterSale, 0, ',', '.') . ' VNĐ';
    }

    return $this->price;
  }
}
