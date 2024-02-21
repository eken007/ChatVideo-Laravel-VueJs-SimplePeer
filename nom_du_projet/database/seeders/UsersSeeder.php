<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            User::create([
                'name' => 'Dylan',
                'email' => 'dilan@gmail.com',
                'password' => Hash::make('123456789')
            ]);
            User::create([
                'name' => 'lawal',
                'email' => 'lawal@gmail.com',
                'password' => Hash::make('123456789')
            ]);
        }
    }
}
