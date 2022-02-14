<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $guarded = [];
    public $timestamps = true;
    protected $perPage = 8;

    public function customer(){

        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }


    public function voucher(){

        return $this->hasOne(Voucher::class, 'id', 'voucher_id');
    }

    public function scopeUser($query, $customerID)
    {
        if ($customerID != '') {

            $query->where('customer_id', $customerID);
        }

        return $query;
    }
}
