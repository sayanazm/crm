<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserClient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'client_id',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function client() : BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
