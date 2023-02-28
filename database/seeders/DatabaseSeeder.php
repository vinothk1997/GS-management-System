<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DistrictSeeder::class,
            DivisionSeeder::class,
            GNDivisionSeeder::class,
            EthnicSeeder::class,
            ReligionSeeder::class,
            OccupationSeeder::class,
            FamilyHeadSeeder::class,
            PensionSeeder::class,
            PensionSeeder::class,
            
        ]);
    }
}