<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'image_path',
        'image_type',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
