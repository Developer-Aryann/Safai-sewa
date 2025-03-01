<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'name',
        'email',
        'phone',
        'address',
        'other',
    ];

    protected $casts = [
        'store_id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'address' => 'string',
        'other' => 'object',
    ];

    public function store()
    {
        return $this->belongsTo(User::class, 'store_id');
    }
    
}
