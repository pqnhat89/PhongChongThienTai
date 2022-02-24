<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['logo', 'site_name', 'address', 'phone', 'fax', 'email'];
        $data = [];
        foreach ($name as $v) {
            $data[] = [
                'name' => $v
            ];
        }
        DB::table('setting')->insert($data);
    }
}
