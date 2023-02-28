<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class GNDivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gn_divisions')->insert(
            [
                [
                    'gn_id'=>'GN001',
                    'name'=>'Gnanimadam',
                    'code'=>'KN/63',
                    'division_id'=>'DV001'
                ],
                [
                    'gn_id'=>'GN002',
                    'name'=>'Karukkaitivu',
                    'code'=>'KN/64',
                    'division_id'=>'DV001'
                ],
              
            ]
           ); 
    }
}