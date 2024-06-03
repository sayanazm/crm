<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Worker extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'email',
        'phone',
        'birth_date',
        'category',
        'comment',
    ];

    use HasFactory;

}
