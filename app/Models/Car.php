<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'make', 'model', 'year', 'daily_rate', 'thumbnail', 'description', 'available', 'created_by'
    ];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
