<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guest = User::create([
            'name' => 'Guest Role',
            'email' => 'guest@role.test',
            'password' => bcrypt('12345678')
        ]);

        $guest->assignRole('aktif');

        // $user = User::create([
        //     'name' => 'User Role',
        //     'email' => 'user@role.test',
        //     'password' => bcrypt('12345678')
        // ]);

        // $user->assignRole('user');
    }
}
