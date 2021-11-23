<?php

namespace Database\Seeders;

use App\Models\Zone;
use Illuminate\Database\Seeder;

class ZonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Will have 2 doors
        $z = new Zone;
        $z->name="Atrium Zone";
        $z->save();

        // Will have 1 door
        $z = new Zone;
        $z->name="Loft Zone";
        $z->save();

        // Will have 0 doors
        $z = new Zone;
        $z->name="Empty Zone";
        $z->save();

        Zone::factory()->count(10)->create();
    }
}
