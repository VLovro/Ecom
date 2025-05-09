<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 38; $i<=48; $i++){
            Size::create([
                'label' => strval($i),
                'type' => 'shoe',
            ]);

        }
        $apparel = ['XS','S','M','L','XL','XXL'];
        foreach ($apparel as $size) {
            Size::create([
                'label' => $size,
                'type'  => 'apparel',
            ]);
        }
        $accessories = ['S', 'M', 'L', 'XL'];
        foreach ($accessories as $size) {
            Size::create([
                'label' => $size,
                'type'  => 'accessories',
            ]);
        }
        
    }
}
