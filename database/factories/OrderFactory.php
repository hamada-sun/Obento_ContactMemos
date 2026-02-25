<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\DailyMenu;
use App\Models\StaffMember;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // 依存モデルのIDを動的に取得
        $customerId = Customer::inRandomOrder()->first()?->id ?? 1;
        $dailyMenuId = DailyMenu::inRandomOrder()->first()?->id ?? 1;
        $contactPersonId = StaffMember::inRandomOrder()->first()?->id ?? 1; // 連絡担当者

        // 配達日時を生成
        $deliveryDate = $this->faker->dateTimeBetween('+1 day', '+30 days')->format('Y-m-d');
        $preferredDeliveryTime = $this->faker->time('H:i:s');

        return [
            'received_date' => $this->faker->date(),
            'daily_menu_id' => $dailyMenuId,
            'customer_id' => $customerId,
            'delivery_date' => $deliveryDate,
            'preferred_delivery_time' => $preferredDeliveryTime,
            'no_miso_soup' => $this->faker->boolean(15),
            'no_cup_for_miso' => $this->faker->boolean(15),
            'no_chopsticks' => $this->faker->boolean(15),
            'buy_coupon_ticket' => $this->faker->boolean(5),
            'note' => $this->faker->optional()->text(100),
            'contact_person_id' => $contactPersonId, // 必須
            'delivered' => $this->faker->optional()->dateTimeThisMonth(),
            'is_paid' => $this->faker->boolean(70),
            'payment_method_id' => $this->faker->numberBetween(0, 2), // 0='現金'
            'is_discounted' => $this->faker->boolean(5),
            'deliverer_id' => StaffMember::inRandomOrder()->first()?->id, // 配達員ID (Optional)
        ];
    }
}
