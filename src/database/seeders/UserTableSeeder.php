<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'AAA',
                'email' => 'a@example.com',
                'password' => Hash::make('passwordA'),
            ],
            [
                'name' => 'BBB',
                'email' => 'b@example.com',
                'password' => Hash::make('passwordB'),
            ],
            [
                'name' => 'CCC',
                'email' => 'c@example.com',
                'password' => Hash::make('passwordC'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
