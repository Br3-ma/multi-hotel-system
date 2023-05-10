<?php

namespace Database\Seeders;

use App\Models\Team;
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
        $user = User::create([
            'fname' => 'Shamba',
            'lname' => 'Adminstrator',
            'email' => 'admin@shamba.com',
            'password' => bcrypt('shamba.@123'),
        ]);

        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->fname, 2)[0]."'s Hotel",
            'personal_team' => true,
        ]));
    }
}
