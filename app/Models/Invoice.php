<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'rental_id', 'issue_date', 'due_date', 'total', 'paid'
    ];

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }
}
