<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Service extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'price',
        'description'
    ];

    public function user() :HasOne
    {
        return $this->hasOne(User::class);
    }

    use HasFactory;
}
