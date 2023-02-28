<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 
        DB::table('religions')->insert(
            [
                [
                    'religion_id'=>'RG01',
                    'name'=>'Hindu'
                ],
            
              
            ]
            );
    }
}