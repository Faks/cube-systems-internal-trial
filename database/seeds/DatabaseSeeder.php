<?php

use App\User;
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
        return User::create(
            [
                'name' => 'Cube Systems Internal Trial',
                'email' => 'cube-systems-internal-trial@solum-designum.eu',
                'password' => bcrypt('cube-systems-internal-trial'),
                'email_verified_at' => now(),
            ]
        );
    }
}
