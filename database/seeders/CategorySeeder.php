<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['category_name' => 'Canned Goods', 'description' => 'Various canned food items'],
            ['category_name' => 'Dairy Products', 'description' => 'Milk, cheese, and other dairy products'],
            ['category_name' => 'Noodles', 'description' => 'Different types of noodles and pasta'],
            ['category_name' => 'Frozen Foods', 'description' => 'Frozen meals and ingredients'],
            ['category_name' => 'Beverages', 'description' => 'Drinks including sodas, juices, and water'],

        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
