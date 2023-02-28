<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('districts')->insert(
            [
                [
                    'district_id'=>'DS01',
                    'name'=>'Kilinochci',
                ],
                [
                    'district_id'=>'DS02',
                    'name'=>'Mullaitivu',
                ]
            ]
           ); 
    }
}