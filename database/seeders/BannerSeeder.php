<?php
namespace Database\Seeders;
	
use App\Enums\BannerTitle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$data = [
			[
				'title' => BannerTitle::TOP_HEADER,
				'description' => 'Banner đầu trang',
				'image' => '/public/uploads/images/PCTTDN.jpg',
				'created_at' => today(),
				'updated_at' => today(),
			],
			[
				'title' => BannerTitle::QR_CODE,
				'description' => 'QR Code',
				'image' => '/public/uploads/images/QRcode.png',
				'created_at' => today(),
				'updated_at' => today(),
			],
			[
				'title' => BannerTitle::FOOTER_BANNER,
				'description' => 'Banner cuối trang',
				'image' => '/public/uploads/images/VVVVV.png',
				'created_at' => today(),
				'updated_at' => today(),
			]
		];
		
		DB::table('banner')->insert($data);
	}
}
