<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Laravel\Passport\Passport;
use App\Models\Role;
use App\Models\Petition;
use App\Models\Wallet;
use App\Models\Address;
use App\Models\Order;
use App\Models\Product;
use App\Models\Opinion;
use App\Models\Coupon;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        "phone",
        "google_id",
        "role_id"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function petition()
    {
        return $this->hasOne(Petition::class);
    }

    public function wallets()
    {
        return $this->hasMany(Wallet::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function opinions()
    {
        return $this->hasMany(Opinion::class);
    }

    public function coupons()
    {
        return $this->belongsToMany(Coupon::class)->withPivot('redeem_date');
    }

    public function hasRole($role)
    {
        if ($this->role()->where('role', $role)->first()) {
            return true;
        }
        return false;
    }
}
