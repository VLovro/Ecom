<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class ProductSizeStockSeeder extends Seeder
{
    
    public function run(): void
    {
        // Get all existing records from the product_size pivot table
        $productSizes = DB::table('product_size')->get();

        foreach ($productSizes as $productSize) {
            // Generate a random stock value between 1 and 50
            $randomStock = rand(1, 50);

            // Update the 'stock' column for this specific product-size combination
            DB::table('product_size')
                ->where('product_id', $productSize->product_id)
                ->where('size_id', $productSize->size_id)
                ->update(['stock' => $randomStock]);
        }

        $this->command->info('Product_size stock updated with random values between 1 and 50.');
    }
}