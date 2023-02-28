<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('divisions')->insert(
            [
                [
                    'district_id'=>'DS01',
                    'division_id'=>'DV002',
                    'name'=>'Karachchi',
                ],
                [
                    'district_id'=>'DS01',
                    'division_id'=>'DV001',
                    'name'=>'Poonakary',
                ]
            ]
           ); 
    }
}