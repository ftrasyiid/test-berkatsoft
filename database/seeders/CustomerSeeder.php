<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'name' => 'Harun Yohanes Wibowo',
            'gender' => 'Laki-laki',
            'birthdate' => '1998-02-05'
        ]);
    }
}
