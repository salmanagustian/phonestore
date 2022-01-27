<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [[
            'fullname'   => 'M Salman Agustian',
            'username'   => 'salmanagustian',
            'password'   => Hash::make('123456'),
            'points'     => 0,
            'roles'      => User::ROLE_ADMIN,
            'created_at' => Carbon\Carbon::now(),
        ]];

        $faker  = Faker\Factory::create();

        for ($i=0; $i < 2 ; $i++) { 
            array_push($users, [
                'fullname'   => $faker->name,
                'username'   => $faker->unique()->userName(),
                'password'   => Hash::make('123456'),
                'points'     => rand(100000, 400000),
                'roles'      => User::ROLE_CUSTOMER,
                'created_at' => Carbon\Carbon::now(),
            ]);
        }

        User::insert($users);
    }
}
