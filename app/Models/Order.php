<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $fillable = [
        'service_id',
        'worker_id',
        'client_id',
        'notification_id',
        'discount',
        'total',
        'payment_status',
        'order_status_id',
        'start',
        'end',
    ];

    use HasFactory;

    public function userService(): HasOne
    {
        return $this->hasOne(UserService::class, 'id', 'service_id');
    }

    public function userClient(): HasOne
    {
        return $this->hasOne(UserClient::class, 'id', 'client_id');
    }

    public function userWorker(): HasOne
    {
        return $this->hasOne(UserWorker::class, 'id', 'worker_id');
    }

}
