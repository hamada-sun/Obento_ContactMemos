<?php

namespace Database\Factories;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    public function definition(): array
    {
        $destinationId = Destination::inRandomOrder()->first()?->id ?? 1;

        // --- 電話番号関連の変数をすべてここで定義 ---
        $fixedPhonePrefixes = ['03', '06', '04']; // 固定電話用 (2桁が多い)
        $mobilePhonePrefixes = ['090', '080', '070']; // 携帯電話用 (3桁)

        $phoneNumber = null;
        $mobileNumber = null;

        // 1. 固定電話番号 (10桁に収める: 2桁プレフィックス + 8桁の数字)
        $phonePrefix = $this->faker->randomElement($fixedPhonePrefixes);
        $phoneSuffix = $this->faker->numberBetween(10000000, 99999999); // 8桁
        $phoneNumber = $phonePrefix . $phoneSuffix; // 合計10桁

        // 2. 携帯電話番号 (カラム制約に合わせて10桁以下に制御: 3桁プレフィックス + 7桁の数字)
        $mobilePrefix = $this->faker->randomElement($mobilePhonePrefixes); // ★ ここで $mobilePhonePrefixes を使用
        $mobileSuffix = $this->faker->numberBetween(1000000, 9999999); // 7桁
        $mobileNumber = $mobilePrefix . $mobileSuffix; // 合計10桁
        // ---------------------------------------------------

        return [
            'name' => $this->faker->name(),
            'default_payment_method_id' => $this->faker->numberBetween(0, 2),
            'phone_number' => $phoneNumber,      // 固定電話 (10桁)
            'mobile_number' => $mobileNumber,    // 携帯電話 (10桁)
            'default_no_miso_soup' => $this->faker->boolean(10),
            'default_no_cup_for_miso' => $this->faker->boolean(10),
            'default_no_chopsticks' => $this->faker->boolean(10),
            'point_balance' => $this->faker->randomNumber(5, true),
            'note' => $this->faker->text(100), // NOT NULL対応済み
            'destination_id' => $destinationId,
        ];
    }
}
