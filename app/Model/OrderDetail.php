<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'unit_price',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_details', 'id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
