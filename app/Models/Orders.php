<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    const PENDING = 'pending';
    const PROCESSING = 'processing';
    const COMPLETED = 'delivered';
    const DECLINED = 'cancelled';
    const RETURNED = 'returned';
    const ON_DELIVERY = 'on_delivery';

    const CASH = 'cash';
    const ONLINE = 'online';

    const PAID = 'paid';
    const PENDING_PAYMENT = 'pending';

    const STATUS = [
        self::PENDING,
        self::PROCESSING,
        self::COMPLETED,
        self::ON_DELIVERY,
        self::DECLINED,
        self::RETURNED,
    ];

    const PAYMENT_TYPE = [
        self::CASH,
        self::ONLINE,
    ];

    const PAYMENT_STATUS = [
        self::PENDING_PAYMENT,
        self::PAID,
    ];

    protected $fillable = [
        'store_id',
        'customer_id',
        'order_id',
        'discount_id',
        'note',
        'total',
        'discount',
        'tax',
        'grand_total',
        'paid_amoount',
        'due_amount',
        'order_status',
        'payment_type',
        'payment_status',
    ];

    public function store()
    {
        return $this->belongsTo(User::class, 'store_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'order_id');
    }

    public function discount()
    {
        return $this->belongsTo(Coupon::class, 'discount_id');
    }
}
