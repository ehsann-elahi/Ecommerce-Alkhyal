<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'tap_id',
        'transaction_id',
        'amount',
        'currency',
        'status',
        'raw_response',
    ];

    protected $casts = [
        'response' => 'array', // Automatically cast JSON to array
    ];

    // Relationship: Payment belongs to an Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
