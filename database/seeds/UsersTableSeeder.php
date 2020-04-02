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
         $user=App\User::create([
            'name'=>'Thantzaw',
            'email'=>'thantzaw1@gmail.com',
            'password'=>bcrypt('liverpool'),
            'admin'=>1
        ]);
        App\Profile::create([
            'user_id'=>$user->id,
            'avartar'=>'/profile/pic/a.jpg',
            'about'=>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate sit eius tenetur dolorem. Autem,',
            'facebook'=>'www.facebook.com',
            'youtube'=>'www.youtube.com'
        ]);
    }
}
