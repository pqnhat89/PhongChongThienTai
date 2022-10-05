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
	    DB:: table('menu')->truncate();
        $data = [
	        [
		        'title' => "Ban Chỉ đạo TW về PCTT",
		        'url' => "http://phongchongthientai.mard.gov.vn/Pages/Trang-chu.aspx",
		        'icon' => "fa fa-globe",
		        'order' => 1
	        ],
	        [
		        'title' => "Khí tượng thủy văn TW",
		        'url' => "http://www.nchmf.gov.vn/",
		        'icon' => "fa fa-globe",
		        'order' => 2
	        ],
	        [
		        'title' => "Ảnh mây vệ tinh",
		        'url' => "http://www.nchmf.gov.vn/Web/vi-VN/72/Default.aspx",
		        'icon' => "fa fa-cloud",
		        'order' => 3
	        ],
	        [
		        'title' => "Phân tích ảnh vệ tinh hằng ngày",
		        'url' => "http://www.typhoon2000.ph/t2kgraphsat.gif",
		        'icon' => "fa fa-calendar",
		        'order' => 4
	        ],
	        [
		        'title' => "Dự báo bão Việt Nam",
		        'url' => "http://www.vnbaolut.com/",
		        'icon' => "glyphicon glyphicon-bullhorn",
		        'order' => 5
	        ],
	        [
		        'title' => "Dự báo bão hải quân Hoa Kỳ",
		        'url' => "https://www.nrlmry.navy.mil/tc_pages/tc_home.html",
		        'icon' => "glyphicon glyphicon-bullhorn",
		        'order' => 6
	        ],
	        [
		        'title' => "Dự báo bão Hong Kong",
		        'url' => "http://www.hko.gov.hk/wxinfo/currwx/tc_gis_e.htm",
		        'icon' => "glyphicon glyphicon-bullhorn",
		        'order' => 7
	        ],
	        [
		        'title' => "Trường gió toàn cầu",
		        'url' => "https://earth.nullschool.net/",
		        'icon' => "fa fa-globe",
		        'order' => 8
	        ],
	        [
		        'title' => "Dự báo bão Nhật Bản",
		        'url' => "http://www.jma.go.jp/en/typh",
		        'icon' => "fa fa-globe",
		        'order' => 9
	        ],
	        [
		        'title' => "Dự báo TSR",
		        'url' => "http://www.tropicalstormrisk.com/tracker/dynamic/W.html",
		        'icon' => "fa fa-globe",
		        'order' => 10
	        ]
        ];
        DB::table('menu')->insert($data);

    }
}
