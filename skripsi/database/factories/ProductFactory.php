<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odelProduct>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

            $product_name = $this->faker->unique()->words($nb=6,$asText = true);
            $slug = Str::slug($product_name,'-');
             return [
                'name' => $product_name,
                'slug' => $slug,
                'deskripsi_pendek' => $this->faker->text(200),
                'deskripsi' => $this->faker->text(500),
                'harga_normal' => $this->faker->numberBetween(10,500),
                'SKU' => 'PRD' . $this->faker->unique()->numberBetween(10,500),
                'status_barang' => 'ada',
                'alamattoko' => fake()->address,
                'berat_barang' => $this->faker->numberBetween(1,10),
                'jumlah_barang' => $this->faker->numberBetween(10,50),
                'image' => 'product-' .$this->faker->numberBetween(1,16),
                'category_id' => $this->faker->numberBetween(1,5),
                'user_id' => $this->faker->numberBetween(1,5),
                
        ];
    }
}
