<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('logo')->insert([
            'name' => 'Laravel',
            'slogan' => 'Ahihi đồ ngốc',
            'image' => '/uploads/images/laravel.png'
        ]);
    }
}
