<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
            'name'=>'super admin',
            'email'=>'admin@test.com',
            'password'=>bcrypt('admin'),
            'gender'=>'male',
            'birth_date'=>'2020-11-09',
            'married'=>'true',
            'children_number'=>'3',
            'hoppies'=>'gaming'
        ]);
        $user->attachRole('super_admin');

        for ($i = 1; $i < 10; $i++) {
            $user=User::create([

            'name'=>Str::random(5),
            'email'=>Str::random(10) . '@gmail.com',
            'password'=>bcrypt('password'),
            'gender'=>'male',
            'birth_date'=>'1995-11-09',
            'married'=>'true',
            'children_number'=>$i,
            'hoppies'=>'gaming'

            ]);
        $user->attachRole('user');

        }
    }
}
