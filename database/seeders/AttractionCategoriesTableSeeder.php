<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttractionCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // database/seeders/AttractionCategoriesTableSeeder.php
    public function run()
    {
        $categories = [
            [
                'name' => 'Nature & Adventure',
                'description' => 'Explore breathtaking natural wonders such as the Kalandula Falls, Tundavala Gap, and the Namib Desert in southern Angola.',
                'image' => 'nature.jpg',
                'icon_class' => 'flaticon-paragliding'
            ],
            [
                'name' => 'Safari & Wildlife',
                'description' => 'Enjoy an unforgettable experience at Kissama National Park, home to elephants, giraffes, and other iconic African wildlife.',
                'image' => 'safari.jpg',
                'icon_class' => 'flaticon-route'
            ],
            [
                'name' => 'Culture & History',
                'description' => 'Discover Angola\'s rich heritage through its monuments, museums, and traditions.',
                'image' => 'culture.jpg',
                'icon_class' => 'flaticon-tour-guide'
            ],
            [
                'name' => 'Tropical Beaches',
                'description' => 'Relax on the crystal-clear waters of Blue Bay, Praia Morena, and Cabo Ledo.',
                'image' => 'beach.jpg',
                'icon_class' => 'flaticon-map'
            ]
        ];

        foreach ($categories as $category) {
            DB::table('attraction_categories')->insert($category);
        }
    }
}
