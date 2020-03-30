<?php

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
         App\User::create([
            'name'=>'Thantzaw',
            'email'=>'thantzaw1@gmail.com',
            'password'=>bcrypt('liverpool')
        ]);
    }
}
