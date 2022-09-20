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
        $name = [
			'logo' => '',
	        'site_name' => 'BAN CHỈ HUY PHÒNG CHỐNG THIÊN TAI VÀ TÌM KIẾM CỨU NẠN TỈNH ĐẮK NÔNG',
	        'title_header1' => 'UBND TỈNH ĐẮK NÔNG',
	        'title_header2' => 'BAN CHỈ HUY PHÒNG, CHỐNG THIÊN TAI VÀ TÌM KIẾM CỨU NẠN',
	        'title_header3' => 'Dak Nong Provincial Commanding Commitee of Natural Disaster Prevention and Control, Search and Rescue',
	        'address' => 'XX XXX XXX – Phường XX- Tỉnh Đắk Nông',
	        'phone' => '0234.3822519 - 0234.3849123',
	        'fax' => '0234.3824480',
	        'email' => 'chonglutbaotth@gmail.com ; bchpclbtkcn@daknong.gov.vn',
	        'hotline' => '02613.546.805',
        ];
        $data = [];
        foreach ($name as $key => $v) {
            $data[] = [
                'name' => $key,
                'content' => $v,
            ];
        }
        DB::table('setting')->insert($data);
    }
}
