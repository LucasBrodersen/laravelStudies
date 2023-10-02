<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';

    protected $fillable = [
        'customer_id',
        'cost',
        'status',
        'billed_date',
        'paid_date'
    ];


    public function customer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
