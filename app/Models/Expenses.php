<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;

    const TAX_ENABLED = 1;
    const TAX_DISABLED = 0;

    const PAYMENT_MODE_CASH = 1;
    const PAYMENT_MODE_ONLINE = 2;

    protected $fillable = [
        'store_id',
        'category_id',
        'amount',
        'description',
        'date',
        'tax',
        'tax_amount',
        'mode',
    ];

    public function category()
    {
        return $this->belongsTo(Expenses_category::class, 'category_id');
    }

    public function store()
    {
        return $this->belongsTo(User::class, 'store_id');
    }
}
