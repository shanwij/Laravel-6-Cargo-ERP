<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate(); 

        $managerRole = Role::where('name', 'manager')->first(); 
        $accountsRole = Role::where('name', 'accounts')->first();
        $operationsRole = Role::where('name', 'operations')->first();
        $marketingRole = Role::where('name', 'marketing')->first();
        $resourcesRole = Role::where('name', 'resources')->first();
    
        $manager = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);

        $accounts = User::create([
            'name' => 'Accounts',
            'email' => 'accounts@admin.com',
            'password' => bcrypt('admin')
        ]);

        $operations = User::create([
            'name' => 'Operations',
            'email' => 'op@admin.com',
            'password' => bcrypt('admin')
        ]);

        $marketing = User::create([
            'name' => 'Marketing',
            'email' => 'marketing@admin.com',
            'password' => bcrypt('admin')
        ]);

        $resources = User::create([
            'name' => 'Resources',
            'email' => 'resources@admin.com',
            'password' => bcrypt('admin')
        ]);

        $manager->roles()->attach($managerRole);
        $accounts->roles()->attach($accountsRole); 
        $operations->roles()->attach($operationsRole); 
        $marketing->roles()->attach($marketingRole); 
        $resources->roles()->attach($resourcesRole); 
    }
}
