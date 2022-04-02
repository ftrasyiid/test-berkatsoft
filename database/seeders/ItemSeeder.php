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
            ['name' => 'Apel', 'price' => 1000, 'weight' => 100, 'characteristic' => 'Buah berwarna merah, terasa manis'],
            ['name' => 'Mangga', 'price' => 1000, 'weight' => 100, 'characteristic' => null],
            ['name' => 'Jeruk', 'price' => 1000, 'weight' => 120, 'characteristic' => null],
            ['name' => 'Semangka', 'price' => 1000, 'weight' => 500, 'characteristic' => null],
            ['name' => 'Durian', 'price' => 1000, 'weight' => 500, 'characteristic' => 'Buah berduri']
        ]);
    }
}
