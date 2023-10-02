<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';

    protected $fillable = [
        'name',
        'type',
        'email',
        'address',
        'city',
        'state',
        'postal_code'
    ];

    public function services(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Service::class);
    }
}
