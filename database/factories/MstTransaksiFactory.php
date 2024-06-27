<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MstTransaksi>
 */
class MstTransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'tanggal' => $this->faker->date(),
            'invoice_code' => $this->faker->sentence(10),
            'keterangan' => $this->faker->sentence(10),
            'total' => $this->faker->randomNumber(4),
            'broadcast' => $this->faker->boolean(),
            'status' => $this->faker->boolean(),
            'batal' => $this->faker->boolean(),
            'user_id' => $this->faker->randomNumber(1),
        ];
    }
}
