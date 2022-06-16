<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public const STATUS = [
        0 => [
            'label' => 'bg-info',
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

    use HasFactory;

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
