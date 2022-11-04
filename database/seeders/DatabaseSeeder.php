<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
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
       User::create([
        'nama' => 'admin',
        'username' => 'admin',
        'email' => 'admin@yahoo.com',
        'status' => null,
        'level' => 'admin',
        'password' => bcrypt('admin')
       ]);
       User::create([
        'nama' => 'user',
        'username' => 'user',
        'email' => 'user@gmail.com',
        'status' => "2012-12-03",
        'level' => 'user',
        'password' => bcrypt('user')
       ]);
    }
}
