<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class OccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('occupations')->insert(
            [
                [
                    'occupation_id'=>'OC001',
                    'name'=>'Accountant'
                ],
            
                [
                    'occupation_id'=>'OC002',
                    'name'=>'Software Engineer'
                ],
            ]
            );
        
    }
}