<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'parent_id',
    ];

    public static $parents = [
        'Food' => 1,
        'Drink' => 2,
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeSearch($query, $search, $searchKey)
    {
        if ($searchKey === 'parent') {
            return $query->where('parent_id', self::$parents[ucfirst($search)]);
        }

        return $query->where($searchKey, 'like', "%$search%");
    }
}
