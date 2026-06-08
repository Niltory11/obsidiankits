<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'customer_name',
        'customer_number',
        'customer_address',
        'jersey_name',
        'name_number',
        'total_price',
        'status',
        'qty',
        'payment_status',
    ];
}
