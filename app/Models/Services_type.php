<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services_type extends Model
{
    use HasFactory;

    protected $table = 'services_types';

    const ACTIVE_STATUS = 1;
    const INACTIVE_STATUS = 0;

    protected $fillable = [
        'store_id',
        'name',
        'price',
        'status'
    ];

    public function store()
    {
        return $this->belongsTo(User::class);
    }
}
