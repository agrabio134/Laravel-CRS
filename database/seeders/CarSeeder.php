<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cars')->insert([
            [
            'make' => 'Toyota',
            'model' => 'Corolla',
            'year' => '2019-01-01',
            'daily_rate' => '1000.00',
            'thumbnail' => 'https://www.toyota.com/imgix/responsive/images/mlp/colorizer/2020/corolla/1.8l/ce/4dr-sedan/phantom-gray-mica/phantom-gray-mica-1.png?auto=format%2Ccompress&bg=0FFF&fit=crop&h=300&ixlib=php-1.1.0&q=45&w=300&s=0e8e8e8e8e8e8e8e',
            'description' => 'The 2020 Toyota Corolla is a compact sedan that offers a lot of value for the money. It has a roomy interior, a smooth ride, and a long list of standard features. The Corolla is also one of the most fuel-efficient non-hybrid cars on the market.',
            'available' => '1',
            'created_by' => '1',
            ],
            [
            'make' => 'Ford',
            'model' => 'Fusion',
            'year' => '2019-01-01',
            'daily_rate' => '3000.00',
            'thumbnail' => 'https://www.ford.com/cmslibs/content/dam/vdm_ford/live/en_us/ford/nameplate/fusion/2020/collections/20_fusion_4dr_sedan_se_fwd/20_fusion_4dr_sedan_se_fwd_1_1.jpg/_jcr_content/renditions/cq5dam.web.1280.1280.jpeg',
            'description' => 'The 2020 Ford Fusion is a midsize sedan that offers a lot of value for the money. It has a roomy interior, a smooth ride, and a long list of standard features. The Fusion is also one of the most fuel-efficient non-hybrid cars on the market.',
            'available' => '1',
            'created_by' => '1',
            ],
            [
            'make' => 'Honda',
            'model' => 'Civic',
            'year' => '2019-01-01',
            'daily_rate' => '2500.00',
            'thumbnail' => 'https://www.honda.com/sites/default/files/styles/1_1_medium/public/2020-civic-sedan-touring-1_0.jpg?itok=6Z7Z7Z7Z',
            'description' => 'The 2020 Honda Civic is a compact sedan that offers a lot of value for the money. It has a roomy interior, a smooth ride, and a long list of standard features. The Civic is also one of the most fuel-efficient non-hybrid cars on the market.',
            'available' => '1',
            'created_by' => '1',
            ]
        ]);
    }
}
