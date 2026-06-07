<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'customer_name',
        'jersey_name',
        'total_price',
        'status',
        'payment_status',
    ];
}