<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Size;

class ProductSeeder extends Seeder
{
    public function run(): void
{
    // 1️⃣ Grab & shuffle all category IDs once
    $allCategoryIds = Category::pluck('id')->shuffle()->toArray();

    // 2️⃣ Group every size ID by its “type” (shoe, apparel, accessories)
    $sizeIdsByType = Size::all()
        ->groupBy('type')
        ->map(fn($col) => $col->pluck('id')->toArray());

    Product::factory(50)
        ->create()
        ->each(function (Product $product, $index) use ($allCategoryIds, $sizeIdsByType) {
            // 3️⃣ Pick one category ID for this product in round‑robin fashion
            $catId = $allCategoryIds[$index % count($allCategoryIds)];
            $product->categories()->attach($catId);

            // 4️⃣ Look up which “group” that category belongs to (shoes/apparel/etc.)
            $group = Category::find($catId)->group;

            // 5️⃣ Map that group name to the matching size‑type key
            $map = [
                'shoes'       => 'shoe',
                'apparel'     => 'apparel',
                'accessories' => 'accessories',
            ];
            $type = $map[$group] ?? 'apparel';

            // 6️⃣ From our pre‑grouped sizes, grab the right bucket, shuffle it, then take 2–5 IDs
            $sizeIds = collect($sizeIdsByType[$type])
                       ->shuffle()
                       ->take(rand(2, 5))
                       ->all();

            // 7️⃣ Attach those size IDs to the product
            $product->sizes()->attach($sizeIds);
        });
}

}
