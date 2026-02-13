<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $table = 'destinations';

    protected $fillable = [
        'postal_code',
        'prefecture',
        'city',
        'street_address',
        'building_name',
        'full_address',
        'latitude',
        'longitude'
    ];

    protected $casts = [
        'is_billing_address' => 'boolean'
    ];


    public function customer()
    {
        return $this->hasMany(Customer::class, 'destination_id');
    }
    //
}
