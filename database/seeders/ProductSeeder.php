<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $categories = Category::all();

          foreach($categories as $categories) {
            Product::factory()->count(10)->create([
                'category_id' => $categories->id,
            ]);
          }
    }
}
