<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserWorker extends Model
{
    protected $fillable = [
        'user_id',
        'worker_id',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function worker() : BelongsTo
    {
        return $this->belongsTo(Worker::class);
    }

}
