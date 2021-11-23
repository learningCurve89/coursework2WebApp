<?php

namespace Database\Seeders;

use App\Models\Door;
use App\Models\Zone;
use Illuminate\Database\Seeder;

class DoorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Atrium Zone
        $d = new door;
        $d->name="Atrium Main Door";
        $d->zone()->associate(Zone::find(1));
        $d->save();

        // Atrium Zone
        $d = new door;
        $d->name="Atrium Side Door";
        $d->zone()->associate(Zone::find(1));
        $d->save();

        // Loft Zone
        $d = new door;
        $d->name="Loft Door";
        $d->zone()->associate(Zone::find(2));
        $d->save();

        // No Zone
        $d = new door;
        $d->name="Back Door";
        $d->save();

        $createdDoors = Door::factory()->count(50)->create();

        // Now that we have created random doors, we will randomly place them in zones.
        // We also randomly skip some doors so they are not in any zone.

        // Get all the zones, but don't include the first 3 fixed zones
        // as we don't wnat to mess those up.
        $zonesToAssign = Zone::all()->skip(3);
        // Randomly associate zero or one random zone to each door we created.
        $createdDoors->each(function ($d) use ($zonesToAssign) {
            // 50% chance of executing the body of the if.
            if (rand(0, 1) == 0) {
                // Get a random zone and place the door in the zone.
                $randomZone = $zonesToAssign->random();
                $d->zone()->associate($randomZone);
                $d->save();
            }
        });


    }
}
