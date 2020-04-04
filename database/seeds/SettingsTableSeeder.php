<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'site_name'=>'TravelCms',
            'address'=>'Yangon,Myanmar',
            'phone'=>'09796873227',
            'about'=>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat autem ab voluptate aspernatur officiis distinctio soluta 
            ullam ex deserunt, quia unde consequatur repellendus qui, delectus totam inventore? Nostrum, natus accusantium.'
        ]);
    }
}
