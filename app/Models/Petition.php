<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Petition extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_name',
        'shop_description',
        'shop_logo',
        'dni_front',
        'dni_back',
        'description',
        "state",
        "reason",
        "user_id"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
