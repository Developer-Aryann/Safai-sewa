<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $fillable = [
        'order_id',
        'store_id',
        'customer',
        'services',
        'addons',
        'addons_total',
        'total',
        'order_date',
        'delivery_date',
    ];

    public function services()
    {
        return $this->belongsTo(Cart_service::class, 'services');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer');
    }

    public function store()
    {
        return $this->belongsTo(User::class, 'store_id');
    }
}
