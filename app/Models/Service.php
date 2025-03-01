<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    const ACTIVE_STATUS = 1;
    const INACTIVE_STATUS = 0;

    protected $fillable = [
        'store_id',
        'name',
        'image',
        'services_ids',
        'status',
    ];

    protected $casts = [
        'services_ids' => 'object',
    ];

    public function store()
    {
        return $this->belongsTo(User::class, 'store_id');
    }

    public function relatedServices()
    {
        return Services_type::whereIn('id', $this->services_ids)->get();
    }

    public function addons()
    {
        return $this->hasMany(Addon::class, 'service_id');
    }
}
