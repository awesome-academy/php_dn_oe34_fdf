<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'full_name',
        'username',
        'email',
        'password',
        'phone_number',
        'role_id',
        'verify_token',
        'verify_at',
    ];

    protected $hidden = [
        'password',
        'verify_token',
    ];

    protected $attributes = [
        'role_id' => 2,
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function suggests()
    {
        return $this->hasMany(Suggest::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function setPasswordAttribute($password)
    {
        return $this->attributes['password'] = bcrypt($password);
    }

    public function setEmailAttribute($email)
    {
        $this->attributes['email'] = $email;

        return $this->attributes['verify_token'] = base64_encode($email) . '.' . base64_encode(now());
    }
}
