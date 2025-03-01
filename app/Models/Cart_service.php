<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_service extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'service_id',
        'quantity',
        'color_id',
        'price',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function store()
    {
        return $this->belongsTo(User::class, 'store_id');
    }
}
