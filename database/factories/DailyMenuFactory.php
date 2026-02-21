<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DailyMenu>
 */
class DailyMenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // 日本語のメニュー名リスト
        $dishNames = ['鶏の唐揚げ定食', 'サバの塩焼き弁当', '生姜焼き弁当', 'ハンバーグ弁当', '幕の内弁当'];

        $servedDate = $this->faker->dateTimeBetween('-7 days', '+7 days')->format('Y-m-d');

        return [
            'bento_type_id' => $this->faker->numberBetween(0, 1), // 0='日替わり弁当'
            'dish_name' => $this->faker->randomElement($dishNames), // ★固定リストから選択
            'served_date' => $servedDate,
            'standard_price' => $this->faker->numberBetween(550, 800),
            'note' => $this->faker->text(50),
            //
        ];
    }
}
