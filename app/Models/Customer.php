<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'name',
        'default_payment_method_id',
        'phone_number',
        'mobile_number',
        'point_balance',
        'note',
        'destination_id'
    ];

    protected $casts = [
        'default_no_miso_soup' => 'boolean',
        'default_no_cup_for_miso' => 'boolean',
        'default_no_chopsticks' => 'boolean'
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
    //
}
