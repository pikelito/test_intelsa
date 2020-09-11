<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Miguel Angel Mariño',
            'email' => 'miguelanmarino@gmail.com',
            'password' => bcrypt('password1234'),
        ]);
    }
}
