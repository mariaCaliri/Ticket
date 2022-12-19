<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
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
                'name'=>'Admin',
                'email'=>'maria.caliri@tecnasoft.it',
                'type'=>'1',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Operator',
                'email'=>'operator@tecnasoft.com',
                'type'=>'2',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'User',
                'email'=>'user@tecnasoft.com',
                'type'=>0,
                'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }

}
