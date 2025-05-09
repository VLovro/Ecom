<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Basketball Shoes',      'group' => 'shoes'],
            ['name' => 'Lifestyle Shoes',       'group' => 'shoes'],
            ['name' => 'Socks',                 'group' => 'accessories'],
            ['name' => 'Basketballs',           'group' => 'accessories'],
            ['name' => 'Headbands',             'group' => 'accessories'],
            ['name' => 'Hats',                  'group' => 'accessories'],
            ['name' => 'Bags & Backpacks',      'group' => 'accessories'],
            ['name' => 'Jerseys',               'group' => 'apparel'],
            ['name' => 'Shorts',                'group' => 'apparel'],
            ['name' => 'T‑shirts',              'group' => 'apparel'],
            ['name' => 'Hoodies & Sweatshirts', 'group' => 'apparel'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }
    }
}
