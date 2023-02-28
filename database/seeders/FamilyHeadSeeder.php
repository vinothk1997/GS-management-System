<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class FamilyHeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('family_heads')->insert(
            [
                [
                    'family_id'=>'FH/GN001/001',
                    'first_name'=>'vinoth',
                    'last_name'=>'kanagasabai',
                    'nic'=>'199710703012',
                    'dob'=>'1997-02-12',
                    'gender'=>'male',
                    'mobile'=>'0769408829',
                    'permanent_address'=>'siththankurichchi,poonanakary',
                    'temporary_address'=>'Nugegoda',
                    'house_no'=>'83',
                    'card_type'=>'U',
                    'internet'=>'ADSL',
                    'married_certificate_no'=>'1000000',
                    'gn_id'=>'GN001',
                    'religion_id'=>'RG01',
                    'ethnic_id'=>'ET01',
                    'occupation_id'=>'OC001',
                ],
            ]
            );
    }
}