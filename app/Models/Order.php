<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'received_date',
        'daily_menu_id',
        'customer_id',
        'delivery_date',
        'preferred_delivery_time',
        'note',
        'contact_person_id',

        'payment_method_id',
        'derivered',
        'deliverer_id'
    ];

    protected $casts = [
        'no_miso_soup' => 'boolean',
        'no_cup_for_miso' => 'boolean',
        'no_chopsticks' => 'boolean',
        'buy_coupon_ticket' => 'boolean',

        'is_paid' => 'boolean',
        'is_discounted' => 'boolean',
    ];


    public function dailyMenu()
    {
        return $this->belongsTo(DailyMenu::class, 'daily_menu_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function ContactStaffMember()
    {
        return $this->belongsTo(StaffMember::class, 'contact_person_id');
    }
    public function DelivererStaffMember()
    {
        return $this->belongsTo(StaffMember::class, 'deliverer_id');
    }





    public function orderRiceDetail()
    {
        return $this->hasMany(OrderRiceDetail::class, 'order_id');
    }
    //
}
