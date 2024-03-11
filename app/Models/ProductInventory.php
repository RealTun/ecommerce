<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInventory extends Model
{
    use HasFactory;
    protected $table = "product_inventory";

    public function products(){
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }
}
