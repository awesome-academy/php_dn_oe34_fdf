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

    public static $types = [
        'Avatar' => 0,
        'Thumbnail' => 1,
    ];

    public static $paths = [
        'Avatar'    => 'images/avatars/',
        'Thumbnail' => 'images/thumbnails/',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
