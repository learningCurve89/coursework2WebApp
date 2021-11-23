<?php

namespace Database\Seeders;

use App\Models\Door;
use App\Models\User;
use App\Models\Zone;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Non-expired admin 2 doors, 1 zone
        $u = new User();
        $u->first_name = "Patricia";
        $u->last_name = "Jones";
        $u->administrator=true;
        $u->expiry=Carbon::now()->addYear();
        $u->email="patriciajones@example.com";
        $u->password=Hash::make('secret');
        $u->remember_token = Str::random(10);
        $u->save();
        $u->doors()->attach(3); // Loft Door
        $u->doors()->attach(4); // Back Door
        $u->zones()->attach(1); // Atrium Zone

        // Non-expired admin 1 doors, 2 zones
        $u = new User();
        $u->first_name = "Pamela";
        $u->last_name = "James";
        $u->administrator=true;
        $u->expiry=Carbon::now()->addYear();
        $u->email="pamelajames@example.com";
        $u->password=Hash::make('secret');
        $u->remember_token = Str::random(10);
        $u->save();
        $u->doors()->attach(4); // Back Door
        $u->zones()->attach(1); // Atrium Zone
        $u->zones()->attach(2); // Loft Zone

        //Non-expired admin one door, no zones
        $u = new User();
        $u->first_name = "Jamie";
        $u->last_name = "Price";
        $u->administrator=true;
        $u->expiry=Carbon::now()->addWeek();
        $u->email="jamieprice@example.com";
        $u->password=Hash::make('secret');
        $u->remember_token = Str::random(10);
        $u->save();
        $u->doors()->attach(1); // Atrium Main Door

        //Non-expired admin no doors, one zone
        $u = new User();
        $u->first_name = "Jackson";
        $u->last_name = "Leek";
        $u->administrator=true;
        $u->expiry=Carbon::now()->addWeek();
        $u->email="jacksonleek@example.com";
        $u->password=Hash::make('secret');
        $u->remember_token = Str::random(10);
        $u->save();
        $u->zones()->attach(1); // Atrium Zone

        //Non-expired admin no doors, one zone but no access
        $u = new User();
        $u->first_name = "Jeremy";
        $u->last_name = "Ward";
        $u->administrator=true;
        $u->expiry=Carbon::now()->addWeek();
        $u->email="jeremyward@example.com";
        $u->password=Hash::make('secret');
        $u->remember_token = Str::random(10);
        $u->save();
        $u->zones()->attach(3); // Empty Zone no doors ~ no access

        //Non-expired admin no doors, no zones
        $u = new User();
        $u->first_name = "Olive";
        $u->last_name = "Davies";
        $u->administrator=true;
        $u->expiry=Carbon::now()->addWeek();
        $u->email="olivedavies@example.com";
        $u->password=Hash::make('secret');
        $u->remember_token = Str::random(10);
        $u->save();

        //Non-Admins
        // Non-expired non-admin 2 doors, 1 zone
        $u = new User();
        $u->first_name = "Lexi";
        $u->last_name = "Mavis";
        $u->administrator=false;
        $u->expiry=Carbon::now()->addYear();
        $u->email="leximavis@example.com";
        $u->password=Hash::make('secret');
        $u->remember_token = Str::random(10);
        $u->save();
        $u->doors()->attach(3); // Loft Door
        $u->doors()->attach(4); // Back Door
        $u->zones()->attach(1); // Atrium Zone

        // Non-expired non-admin 1 door, 2 zones
        $u = new User();
        $u->first_name = "Kevin";
        $u->last_name = "Jackson";
        $u->administrator=false;
        $u->expiry=Carbon::now()->addYear();
        $u->email="kevinjackson@example.com";
        $u->password=Hash::make('secret');
        $u->remember_token = Str::random(10);
        $u->save();
        $u->doors()->attach(4); // Back Door
        $u->zones()->attach(1); // Atrium Zone
        $u->zones()->attach(2); // Loft Zone

        //Non-expired admin one door, no zones
        $u = new User();
        $u->first_name = "David";
        $u->last_name = "Smith";
        $u->administrator=false;
        $u->expiry=Carbon::now()->addWeek();
        $u->email="davidsmith@example.com";
        $u->password=Hash::make('secret');
        $u->remember_token = Str::random(10);
        $u->save();
        $u->doors()->attach(4); // Back Door

        //Non-expired admin no doors, one zone
        $u = new User();
        $u->first_name = "Kelly";
        $u->last_name = "Kent";
        $u->administrator=false;
        $u->expiry=Carbon::now()->addWeek();
        $u->email="kellykent@example.com";
        $u->password=Hash::make('secret');
        $u->remember_token = Str::random(10);
        $u->save();
        $u->zones()->attach(1); // Atrium Zone

        //Non-expired admin no doors, one zone but no access
        $u = new User();
        $u->first_name = "Leo";
        $u->last_name = "Powell";
        $u->administrator=false;
        $u->expiry=Carbon::now()->addWeek();
        $u->email="leopowell@example.com";
        $u->password=Hash::make('secret');
        $u->remember_token = Str::random(10);
        $u->save();
        $u->zones()->attach(3); // Empty Zone no doors ~ no access

        //Non-expired admin no doors, no zones
        $u = new User();
        $u->first_name = "Oliver";
        $u->last_name = "Williams";
        $u->administrator=false;
        $u->expiry=Carbon::now()->addWeek();
        $u->email="oliverwilliams@example.com";
        $u->password=Hash::make('secret');
        $u->remember_token = Str::random(10);
        $u->save();

        //Expired Users
        //Expired non-admin 2 doors
        $u = new User();
        $u->first_name = "Bob";
        $u->last_name = "McDonald";
        $u->administrator=false;
        $u->expiry=Carbon::now()->subYear();
        $u->email="bobmcdonald@example.com";
        $u->password=Hash::make('secret');
        $u->remember_token = Str::random(10);
        $u->save();
        $u->doors()->attach(3); // Loft Door
        $u->doors()->attach(4); // Back Door

        //Expired admin 2 doors
        $u = new User();
        $u->first_name = "Fred";
        $u->last_name = "Weasley";
        $u->administrator=true;
        $u->expiry=Carbon::now()->subYear();
        $u->email="fredweasley@example.com";
        $u->password=Hash::make('secret');
        $u->remember_token = Str::random(10);
        $u->save();
        $u->doors()->attach(3); // Loft Door
        $u->doors()->attach(4); // Back Door

        /**
         * Other random users created with factory
         */
        $createdUsers = User::factory()->count(50)->create();

        // Now that we have created random users, we will randomly add doors and zones to them.

        // Get all the doors but don't include the first 4 fixed doors as we don't wnat to mess those up.
        $doorsToAssign = Door::all()->skip(4);
        // Randomly attached up to 3 random doors to each user we created.
        $createdUsers->each(function ($u) use ($doorsToAssign) {
            // Out of all the doors, pick up to 3 random ones and pull out their ids.
            $randomDoorIds = $doorsToAssign->random(rand(0, 3))->pluck('id');
            // Add the random doors to the user.
            $u->doors()->attach($randomDoorIds);
        });

        // Get all the zones, but don't include the first 3 fixed zones as we don't wnat to mess those up.
        $zonesToAssign = Zone::all()->skip(3);
        // Randomly attached up to 3 random zones to each user we created.
        $createdUsers->each(function ($u) use ($zonesToAssign) {
            // Out of all the zones, pick up to 3 random ones and pull out their ids.
            $randomZoneIds = $zonesToAssign->random(rand(0, 3))->pluck('id');
            // Add the random zones to the user.
            $u->zones()->attach($randomZoneIds);
        });


    }
}
