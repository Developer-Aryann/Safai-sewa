<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses_category extends Model
{
    use HasFactory;

    protected $table = 'expenses_categorys';

    protected $fillable = [
        'store_id',
        'name',
    ];

    public function store()
    {
        return $this->belongsTo(User::class, 'store_id');
    }
}
