<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    const TYPE_PERCENTAGE = 2;
    const TYPE_FIXED = 1;

    protected $fillable = [
        'name',
        'code',
        'discount',
        'status',
        'start_date',
        'end_date',
        'store_id',
        'min_order',
        'max_use',
        'coupon_type',
        'user_usage_limit',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function store()
    {
        return $this->belongsTo(User::class, 'store_id');
    }

    public static function getCouponTypeValue($type)
    {
        switch ($type) {
            case 'percentage':
                return self::TYPE_PERCENTAGE;
            case 'fixed':
                return self::TYPE_FIXED;
            default:
                throw new \InvalidArgumentException("Invalid coupon type: $type");
        }
    }
}
