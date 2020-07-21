<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'order_code',
        'total_price',
        'status',
    ];

    public static $status = [
        'Pending' => 0,
        'Paid' => 1,
        'Cancel' => 2,
    ];

    public static $colorStatus = [
        'warning',
        'success',
        'danger',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function scopeSearch($query, $search, $searchKey)
    {
        if ($searchKey == 'status') {
            $search = isset(self::$status[ucfirst($search)]) ? self::$status[ucfirst($search)] : '';

            return $query->where($searchKey, 'like', "%$search%");
        }

        return $query->where($searchKey, 'like', "%$search%");
    }

    public function getNameStatusAttribute()
    {
        return implode('', array_keys(self::$status, $this->status));
    }

    public function getColorStatusAttribute()
    {
        return self::$colorStatus[$this->status];
    }
}
