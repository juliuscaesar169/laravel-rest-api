<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Commune;
use App\Models\Region;

class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Commune::factory()
            ->count(1)
            ->hasRegion(1)
            ->create();     
    }
}
