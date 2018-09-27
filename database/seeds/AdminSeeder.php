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
        $role = Role::create(['name' => 'patient']);
        $role = Role::create(['name' => 'admin']);

        if (!User::where('email', 'timothy.withers@gmail.com')->exists())
        {
            $user = User::create([
                'name' => 'Tim Withers',
                'email' => 'timothy.withers@gmail.com',
                'password' => bcrypt('password')
            ]);

            $user->assignRole('admin');
        }
    }
}
