<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            ['name' => 'Sepatu Hitam', 'price' => 67000, 'weight' => 250, 'characteristic' => 'Sepatu kulit warna hitam yang eksotis'],
            ['name' => 'Topi Putih', 'price' => 32000, 'weight' => 80, 'characteristic' => null],
            ['name' => 'Baju Koala', 'price' => 83500, 'weight' => 100, 'characteristic' => null],
            ['name' => 'Baju Jerapah', 'price' => 81000, 'weight' => 100, 'characteristic' => null],
            ['name' => 'Celana Loreng', 'price' => 72500, 'weight' => 100, 'characteristic' => 'Celana Loreng Terbuat dari kainyang kuat dan tahan lama']
        ]);
    }
}
