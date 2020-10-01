<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate(); 

        Role::create(['name' => 'manager']);
        Role::create(['name' => 'accounts']);
        Role::create(['name' => 'operations']);
        Role::create(['name' => 'marketing']);
        Role::create(['name' => 'resources']);
    }
}
