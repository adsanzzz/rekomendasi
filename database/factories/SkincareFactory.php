<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

class SkincareFactory extends Factory
{
    protected $model = \App\Models\Skincare::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->word,
            'merk' => $this->faker->company,
            'kategori' => $this->faker->word,
            'cocok_untuk' => 'All Skin Types',
            'harga' => $this->faker->numberBetween(50000, 200000),
            'value' => $this->faker->unique()->numberBetween(1, 100),
            'link' => $this->faker->url,
            'gambar' => UploadedFile::fake()->image('dummy.jpg')->store('images', 'public')
        ];
    }
}
