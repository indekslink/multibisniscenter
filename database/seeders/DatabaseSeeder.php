<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            UserSeeder::class,
        ]);

        // make role
        $role = ['admin', 'user'];
        $roles = [];
        for ($i = 0; $i < count($role); $i++) {
            $roles[$i]['name'] = $role[$i];
        }

        DB::table('roles')->insert($roles);

        // \App\Models\User::factory(10)->create();


    }
}
