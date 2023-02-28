<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pensions')->insert(
            [
                [
                    'pension_no'=>'201201252545',
                    'bank'=>'HNB',
                    'amount'=>50000,
                    'category'=>'EPF',
                    'family_id'=>'FH/GN001/001',
                ],
            ]
            );
    }
}