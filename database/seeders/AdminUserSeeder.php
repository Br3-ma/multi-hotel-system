<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'fname' => 'Shamba',
            'lname' => 'Adminstrator',
            'email' => 'admin@shamba.com',
            'password' => bcrypt('shamba.@123'),
        ]);
    }
}
