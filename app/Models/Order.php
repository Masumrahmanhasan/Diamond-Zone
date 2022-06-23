<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public const STATUS = [
        0 => [
            'label' => 'bg-primary',
            'value' => 'Pending',
        ],
        1 => [
            'label' => 'bg-success',
            'value' => 'Confirmed',
        ],
        2 => [
            'label' => 'bg-danger',
            'value' => 'Canceled',
        ]
    ];

    public const PAYMENTSTATUS = [
        0 => [
            'label' => 'bg-info',
            'value' => 'Unpaid',
        ],
        1 => [
            'label' => 'bg-success',
            'value' => 'Paid',
        ],

    ];

    use HasFactory;

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
