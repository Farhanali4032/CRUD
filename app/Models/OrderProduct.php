<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table = 'order_products';
    protected $primaryKey = "id";


    protected $fillable = [
        'order_id',
        'product_name',
        'category',
        'price',
        'quantity',
        'total_price'
    ];

    function order(){
        return $this->belongsTo(Order::class);
    }
}
