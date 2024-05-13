<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'email',
        'phone',
        'comment',
        'birth_date',
    ];

    use HasFactory;
}
