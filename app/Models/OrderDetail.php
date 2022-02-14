<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_detail';
    protected $guarded = [];
    public $timestamps = true;
    protected $perPage = 8;

    public function product(){

        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
