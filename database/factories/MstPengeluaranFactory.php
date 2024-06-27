<?php

namespace Database\Factories;
use App\Models\MstPengeluaran;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MstPengeluaran>
 */
class MstPengeluaranFactory extends Factory
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
            'nama_barang' => $this->faker->word(15),
            'keterangan' => $this->faker->sentence(10),
            'harga' => $this->faker->randomNumber(4),
            'qty' => $this->faker->randomNumber(2),
            'total' => $this->faker->randomNumber(4),
            'batal' => $this->faker->boolean(),
            'user_id' => $this->faker->randomNumber(1),
            

        ];
    }
}
