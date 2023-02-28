<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class EthnicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('ethnics')->insert(
        [
            [
                'ethnic_id'=>'ET01',
                'name'=>'Tamil',
            ],
            [
                'ethnic_id'=>'ET02',
                'name'=>'Muslim',
            ]
        ]
       ); 
    }
}