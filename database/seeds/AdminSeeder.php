<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if (!User::where('email', 'timothy.withers@gmail.com')->exists())
        {
            $role = Role::create(['name' => 'patient']);
            $role = Role::create(['name' => 'admin']);
            
            $user = User::create([
                'name' => 'Tim Withers',
                'email' => 'timothy.withers@gmail.com',
                'password' => bcrypt('password')
            ]);

            $user->assignRole('admin');
        }
    }
}
