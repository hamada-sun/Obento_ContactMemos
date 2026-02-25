<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffMember extends Model
{
    use HasFactory;

    protected $table = 'staff_members';

    protected $fillable = [
        'name',
        'role'
    ];

    public function contactOrder()
    {
        return $this->hasMany(Order::class, 'contact_person_id');
    }

    public function deliverOrder()
    {
        return $this->hasMany(Order::class, 'deliverer_id');
    }
    //
}
