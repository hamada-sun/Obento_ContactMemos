<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderRiceDetail extends Model
{
    use HasFactory;

    protected $table = 'order_rice_details';

    protected $fillable = [
        'order_id',
        'rice_size_id',
        'quantity'
    ];

    public function order()
    {
        return $this->hasMany(Order::class, 'order_id');
    }
    //
}
