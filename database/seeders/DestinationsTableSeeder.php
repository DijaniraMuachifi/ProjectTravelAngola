<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // database/seeders/DestinationsTableSeeder.php
    public function run()
    {
        $destinations = [
            [
                'name' => 'Kalandula Falls',
                'location' => 'Malanje',
                'short_description' => 'The second largest waterfall in Africa, with a drop of 105 meters.',
                'main_image' => 'kalandula.jpg',
                'rating' => 5,
                'price_from' => 50000,
                'featured' => true
            ],
            [
                'name' => 'Kissama National Park',
                'location' => 'Bengo',
                'short_description' => 'Home to diverse wildlife including elephants, zebras and antelopes.',
                'main_image' => 'kissama.jpg',
                'rating' => 4,
                'price_from' => 75000,
                'featured' => true
            ],
            [
                'name' => 'Miradouro da Lua',
                'location' => 'Luanda',
                'short_description' => 'Spectacular rock formations resembling a lunar landscape.',
                'main_image' => 'miradouro.jpg',
                'rating' => 4,
                'price_from' => 25000,
                'featured' => true
            ],
            [
                'name' => 'Cabo Ledo',
                'location' => 'Bengo',
                'short_description' => 'One of Africa\'s best surfing spots with stunning beaches.',
                'main_image' => 'cabo-ledo.jpg',
                'rating' => 5,
                'price_from' => 60000,
                'featured' => true
            ]
        ];

        foreach ($destinations as $destination) {
            DB::table('destinations')->insert($destination);
        }
    }
}
