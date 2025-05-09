<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'Jordan',
            'Under Armour',
            'Wilson',
            'Spalding',
            'Nike',
            'Adidas',
            'Converse',
            'Puma',
            'Reebok',
            
        ];

        foreach ($names as $name) {
            Brand::create(['name' => $name]);
        }
    }
}
