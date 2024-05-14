<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Client extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'surname',
        'patronymic',
        'email',
        'phone',
        'comment',
        'birth_date',
    ];

    public function order(): HasOne
    {
        return $this->hasOne(Order::class, 'id', 'client_id');
    }

    use HasFactory;
}
