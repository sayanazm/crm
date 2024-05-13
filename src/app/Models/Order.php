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
        'user_id',
        'client_id',
        'discount_id',
        'start_order',
        'duration',
        'payment_status',
    ];

    use HasFactory;

    public function service(): HasOne
    {
        return $this->hasOne(Service::class, 'id', 'service_id');
    }

}
