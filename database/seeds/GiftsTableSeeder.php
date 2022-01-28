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
        $gifts = [
            [
               'series'           => 'Samsung Galaxy S9-Midnight Black 4/64 GB',
               'slug'             => Str::slug('Samsung Galaxy S9-Midnight Black 4/64 GB'),
               'screen'           => '6.2 inci, Dual Edge Super AMOLED 2960 x 1440 (Quad HD+) 529 ppi, 18.5:9',
               'memory'           => 'RAM 6 GB (LPDDR4), ROM 64 GB, MicroSD up to 400GB',
               'operation_system' => 'Android 8.0 (Oreo)',
               'cpu'              => 'Exynos 9810 Octa-core (2.7GHz Quad + 1.7GHz Quad), 64 bit, 10nm processor',
               'camera'           => 'Super Speed Dual Pixel, 12 MP OIS (F1.5/F2.4 Dual Aperture) + 12MP OIS (F2.4) with LED flash, depan 8 MP, f/1.7, autofocus, 1440p@30fps, dual video call, Auto HDR',
               'sim'              => 'Dual SIM (Nano-SIM)',
               'battery'          => 'Non-removable Li-Ion 3500 mAh , Fast Charging on wired',
               'points'           => 200000,
               'stock'            => 15,
               'total_reviews'    => 0,
            ],
            [
               'series'        => 'Samsung Galaxy M52 5G',
               'slug'          => Str::slug('Samsung Galaxy M52 5G'),
               'screen'           => '6.2 inci, Dual Edge Super AMOLED 2960 x 1440 (Quad HD+) 529 ppi, 18.5:9',
               'memory'           => 'RAM 6 GB (LPDDR4), ROM 64 GB, MicroSD up to 400GB',
               'operation_system' => 'Android 8.0 (Oreo)',
               'cpu'              => 'Exynos 9810 Octa-core (2.7GHz Quad + 1.7GHz Quad), 64 bit, 10nm processor',
               'camera'           => 'Super Speed Dual Pixel, 12 MP OIS (F1.5/F2.4 Dual Aperture) + 12MP OIS (F2.4) with LED flash, depan 8 MP, f/1.7, autofocus, 1440p@30fps, dual video call, Auto HDR',
               'sim'              => 'Dual SIM (Nano-SIM)',
               'battery'          => 'Non-removable Li-Ion 3500 mAh , Fast Charging on wired',
               'points'        => 350000,
               'stock'         => 22,
               'total_reviews' => 0,
            ],
            [
               'series' => 'Xiaomi Redmi Note 10',
               'slug' => Str::slug('Xiaomi Redmi Note 10'),
               'screen'           => '6.2 inci, Dual Edge Super AMOLED 2960 x 1440 (Quad HD+) 529 ppi, 18.5:9',
               'memory'           => 'RAM 6 GB (LPDDR4), ROM 64 GB, MicroSD up to 400GB',
               'operation_system' => 'Android 8.0 (Oreo)',
               'cpu'              => 'Exynos 9810 Octa-core (2.7GHz Quad + 1.7GHz Quad), 64 bit, 10nm processor',
               'camera'           => 'Super Speed Dual Pixel, 12 MP OIS (F1.5/F2.4 Dual Aperture) + 12MP OIS (F2.4) with LED flash, depan 8 MP, f/1.7, autofocus, 1440p@30fps, dual video call, Auto HDR',
               'sim'              => 'Dual SIM (Nano-SIM)',
               'battery'          => 'Non-removable Li-Ion 3500 mAh , Fast Charging on wired',
               'points' => 225000,
               'stock' => 10,
               'total_reviews' => 0,
            ],
            [
               'series' => 'Samsung Galaxy A52 5G',
               'slug' => Str::slug('Samsung Galaxy A52 5G'),
                'screen'           => '6.2 inci, Dual Edge Super AMOLED 2960 x 1440 (Quad HD+) 529 ppi, 18.5:9',
               'memory'           => 'RAM 6 GB (LPDDR4), ROM 64 GB, MicroSD up to 400GB',
               'operation_system' => 'Android 8.0 (Oreo)',
               'cpu'              => 'Exynos 9810 Octa-core (2.7GHz Quad + 1.7GHz Quad), 64 bit, 10nm processor',
               'camera'           => 'Super Speed Dual Pixel, 12 MP OIS (F1.5/F2.4 Dual Aperture) + 12MP OIS (F2.4) with LED flash, depan 8 MP, f/1.7, autofocus, 1440p@30fps, dual video call, Auto HDR',
               'sim'              => 'Dual SIM (Nano-SIM)',
               'battery'          => 'Non-removable Li-Ion 3500 mAh , Fast Charging on wired',
               'points' => 150000,
               'stock' => 7,
               'total_reviews' => 0,
            ],
            [
               'series' => 'Samsung Galaxy A52s 5G',
               'slug' => Str::slug('Samsung Galaxy A52s 5G'),
                'screen'           => '6.2 inci, Dual Edge Super AMOLED 2960 x 1440 (Quad HD+) 529 ppi, 18.5:9',
               'memory'           => 'RAM 6 GB (LPDDR4), ROM 64 GB, MicroSD up to 400GB',
               'operation_system' => 'Android 8.0 (Oreo)',
               'cpu'              => 'Exynos 9810 Octa-core (2.7GHz Quad + 1.7GHz Quad), 64 bit, 10nm processor',
               'camera'           => 'Super Speed Dual Pixel, 12 MP OIS (F1.5/F2.4 Dual Aperture) + 12MP OIS (F2.4) with LED flash, depan 8 MP, f/1.7, autofocus, 1440p@30fps, dual video call, Auto HDR',
               'sim'              => 'Dual SIM (Nano-SIM)',
               'battery'          => 'Non-removable Li-Ion 3500 mAh , Fast Charging on wired',
               'points' => 450000,
               'stock' => 4,
               'total_reviews' => 0,
            ],
        ];

        DB::table('gifts')->insert($gifts);
    }
}
