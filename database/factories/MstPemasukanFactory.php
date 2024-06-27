<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MstPemasukan>
 */
class MstPemasukanFactory extends Factory
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
            'keterangan' => $this->faker->sentence(10),
            'total' => $this->faker->randomNumber(4),
            'batal' => $this->faker->boolean(),
            'user_id' => $this->faker->randomNumber(1),
        ];
    }
}
