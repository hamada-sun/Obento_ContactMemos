<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Destination;
use App\Models\Customer;
use App\Models\StaffMember;
use App\Models\DailyMenu;
use App\Models\Order;
use App\Models\OrderRiceDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        StaffMember::factory(5)->create();
        DailyMenu::factory(10)->create();

        Destination::factory(10)->create();

        Customer::factory(10)->create();

        Order::factory(10)->create();

        OrderRiceDetail::factory(15)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
