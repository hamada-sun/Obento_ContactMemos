<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyMenu extends Model
{
    use HasFactory;

    protected $table = 'daily_menus';

    protected $fillable = [
        'bento_type_id',
        'dish_name',
        'served_date',
        'standard_price',
        'note'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'daily_menu_id');
    }
    //
}
