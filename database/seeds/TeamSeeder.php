<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        for ($i = 1; $i <= 6; $i++) {
            $data[] = [
                'name' => "Member $i",
                'position' => "Developer",
                'slogan' => "Code or Die",
                'description' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.",
                'image' => '/uploads/images/laravel.png'
            ];
        }
        DB::table('team')->insert($data);
    }
}
