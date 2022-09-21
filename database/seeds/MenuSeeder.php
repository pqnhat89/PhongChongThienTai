<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        for ($i = 1; $i <= 5; $i++) {
            $data[] = [
                'title' => "Menu $i",
                'url' => "#$i",
                'icon' => "icon-$i",
                'order' => $i
            ];
        }
        DB::table('menu')->insert($data);

        // $data = [];
        // $menu = DB::table('menu')->get();
        // foreach ($menu as $k => $v) {
        //     $data[] = [
        //         'menu_id' => $v->id,
        //         'title' => "Sub Menu " . $v->id,
        //         'url' => "#$k",
        //         'order' => $k
        //     ];
        // }
        // DB::table('submenu')->insert($data);
    }
}
