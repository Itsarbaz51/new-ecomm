<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'order_id', 'mode', 'status', 'razorpay_order_id', 'razorpay_payment_id'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
