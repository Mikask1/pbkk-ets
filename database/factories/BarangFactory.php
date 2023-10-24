<?php

namespace Database\Factories;

use App\Models\JenisBarang;
use App\Models\KondisiBarang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'gambar' => '/images/sample.jpg',
            'nama_barang' => fake()->word(),
            'jumlah_barang' => fake()->numberBetween(1, 100),
            'jenis_barang' => fake()->randomElement(JenisBarang::all())['jenis_barang'],
            'kondisi_barang' => fake()->randomElement(KondisiBarang::all())['kondisi_barang'],
            'kecacatan' => fake()->text(25),
            'keterangan' => fake()->text(25)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}