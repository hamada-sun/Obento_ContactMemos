<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StaffMember>
 */
class StaffMemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // 日本語の名前リスト（Fakerの日本語ロケールで生成されるものとは別の、固定リスト）
        $names = ['山田太郎', '佐藤花子', '田中一郎', '鈴木美咲', '高橋健太'];

        return [
            'name' => $this->faker->randomElement($names), // ★固定リストから選択
            'role' => $this->faker->numberBetween(1, 3), // 役割ID (例: 1=管理者, 2=配達, 3=調理)
        ];
    }
}
