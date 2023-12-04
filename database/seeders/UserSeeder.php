<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            if ($i == 0) {
                $data[] = [
                    'name' => 'Supper Admin',
                    'email' => 'supper@gmail.com',
                    'password' => bcrypt('123'),
                    'role' => 1
                ];
            } else {
                $data[] = [
                    'name' => "Admin $i",
                    'email' => "admin$i@gmail.com",
                    'password' => bcrypt('123'),
                    'role' => 0
                ];
            }
        }
        DB::table('users')->insert($data);
    }
}
