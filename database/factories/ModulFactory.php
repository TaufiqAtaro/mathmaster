<?php

namespace Database\Factories;

use App\Models\Modul;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Modul>
 */
class ModulFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul_modul' => $this->faker->sentence(3), // Bikin 3 kata acak
            'deskripsi' => $this->faker->paragraph(), // Bikin 1 paragraf acak
            'tingkat_kelas' => $this->faker->numberBetween(7, 9), // Angka acak 7, 8, atau 9
        ];
    }
}
