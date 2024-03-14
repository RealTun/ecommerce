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

    return number_format($adjustedPrice, (strpos($adjustedPrice, '.') === false) ? 0 : 2, ',', '.') . ' VNĐ';
  }

  public function getPriceAfterSaleAttribute()
  {
    if ($this->attributes['sale'] != 0) {
      $adjustPrice = $this->attributes['price'] * 3000;
      $priceAfterSale = $adjustPrice - ($adjustPrice * ($this->attributes['sale'] / 100));
      return number_format($priceAfterSale, (strpos($priceAfterSale, '.') === false) ? 0 : 2, ',', '.') . ' VNĐ';
    }

    return $this->price;
  }
}
