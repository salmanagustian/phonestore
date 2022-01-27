<?php

use App\Models\Gift;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GiftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gifts = [
            [
               'series' => 'Samsung Galaxy S9-Midnight Black 4/64 GB',
               'slug' => Str::slug('Samsung Galaxy S9-Midnight Black 4/64 GB'),
               'points' => 200000,
               'stock' => 15,
               'total_reviews' => 0,
            ],
            [
               'series' => 'Samsung Galaxy M52 5G',
               'slug' => Str::slug('Samsung Galaxy M52 5G'),
               'points' => 350000,
               'stock' => 22,
               'total_reviews' => 0,
            ],
            [
               'series' => 'Xiaomi Redmi Note 10',
               'slug' => Str::slug('Xiaomi Redmi Note 10'),
               'points' => 225000,
               'stock' => 10,
               'total_reviews' => 0,
            ],
            [
               'series' => 'Samsung Galaxy A52 5G',
               'slug' => Str::slug('Samsung Galaxy A52 5G'),
               'points' => 150000,
               'stock' => 7,
               'total_reviews' => 0,
            ],
            [
               'series' => 'Samsung Galaxy A52s 5G',
               'slug' => Str::slug('Samsung Galaxy A52s 5G'),
               'points' => 450000,
               'stock' => 4,
               'total_reviews' => 0,
            ],
        ];

        Gift::insert($gifts);
    }
}
