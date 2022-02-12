<?php

use App\Models\Gift;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GiftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gifts = [];

        for ($i=0; $i < 20 ; $i++) { 
           array_push($gifts, [
               'series' => 'Xiaomi Redmi Note 10',
               'slug'   => Str::slug('Xiaomi Redmi Note 10'),
               'screen'           => '6.2 inci, Dual Edge Super AMOLED 2960 x 1440 (Quad HD+) 529 ppi, 18.5:9',
               'memory'           => 'RAM 6 GB (LPDDR4), ROM 64 GB, MicroSD up to 400GB',
               'operation_system' => 'Android 8.0 (Oreo)',
               'cpu'              => 'Exynos 9810 Octa-core (2.7GHz Quad + 1.7GHz Quad), 64 bit, 10nm processor',
               'camera'           => 'Super Speed Dual Pixel, 12 MP OIS (F1.5/F2.4 Dual Aperture) + 12MP OIS (F2.4) with LED flash, depan 8 MP, f/1.7, autofocus, 1440p@30fps, dual video call, Auto HDR',
               'sim'              => 'Dual SIM (Nano-SIM)',
               'battery'          => 'Non-removable Li-Ion 3500 mAh , Fast Charging on wired',
               'points' => 225000,
               'stock' => rand(0, 6),
               'rating' => rand(1, 5) / 10,
               'total_reviews' => 0,
               'flag' => rand(1, 4),
           ]);
        }

        DB::table('gifts')->insert($gifts);
    }
}
