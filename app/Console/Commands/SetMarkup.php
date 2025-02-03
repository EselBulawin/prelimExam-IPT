<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class SetMarkup extends Command
{
    protected $signature = 'markup:set {percentage}';
    protected $description = 'Set markup for all products based on the given percentage';

    public function handle()
    {
        $percentage = $this->argument('percentage');

        if (!is_numeric($percentage) || $percentage < 0) {
            $this->error('Invalid percentage. Provide a numeric value greater than or equal to 0.');
            return;
        }

        $products = Product::all();
        foreach ($products as $product) {
            $newPrice = $product->purchase_price * (1 + $percentage);
            $product->update(['retail_price' => $newPrice]);
        }

        \App\Models\Markup_history::create([
            'date' => now()->toDateString(),
            'mark_up_rate' => $percentage,
        ]);

        $this->info("Retail prices updated with a markup of {$percentage}.");
    }
}
