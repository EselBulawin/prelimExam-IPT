<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category;

class SetCategoryMarkup extends Command
{
    protected $signature = 'markup:set-category {percentage} {category}';
    protected $description = 'Set markup for products in a specific category based on the given percentage';

    public function handle()
    {
        $percentage = $this->argument('percentage');
        $categoryName = $this->argument('category');

        if (!is_numeric($percentage) || $percentage < 0) {
            $this->error('Invalid percentage. Provide a numeric value greater than or equal to 0.');
            return;
        }


        $category = Category::where('category_name', $categoryName)->first();

        if (!$category) {
            $this->error("Category '{$categoryName}' not found.");
            return;
        }

        foreach ($category->products as $product) {
            $newPrice = $product->purchase_price * (1 + $percentage);
            $product->update(['retail_price' => $newPrice]);
        }


        \App\Models\Markup_history::create([
            'date' => now(),
            'mark_up_rate' => $percentage,
        ]);

        $this->info("Retail prices updated for category '{$categoryName}' with a markup of {$percentage}.");
    }
}
