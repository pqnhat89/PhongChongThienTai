<?php
namespace Database\Seeders;
use App\Enums\PostType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$data = [];
		$type = array_values(PostType::toArray());
		foreach ($type as $value) {
			for ($i = 1; $i <= 10; $i++) {
				$data[] = [
					'title' => $value . " $i",
					'sub_title' => "Sáng nay (22/02), không khí lạnh ở phía Bắc đang tăng cường xuống phía Nam. Dự báo: Khoảng gần sáng và ngày mai (23/02), bộ phận không khí lạnh tăng cường này sẽ ảnh hưởng đến Thừa Thiên Huế.",
					'image' => "/public/uploads/images/274455488_283587610545935_3250378910996779643_n.jpg",
					'type' => $value,
					'content' => "Sáng nay (22/02), không khí lạnh ở phía Bắc đang tăng cường xuống phía Nam.

Dự báo: Khoảng gần sáng và ngày mai (23/02), bộ phận không khí lạnh tăng cường này sẽ ảnh hưởng đến Thừa Thiên Huế.

Do ảnh hưởng của không khí lạnh và không khí lạnh tăng cường nên trên đất liền tỉnh Thừa Thiên Huế nhiều mây, có mưa, trời rét; vùng A Lưới trời rét đậm, các nơi khác đêm và sáng trời rét đậm. Gió bắc đến đông bắc cấp 3, vùng ven biển cấp 4.

Trên biển có mưa rải rác. Gió bắc đến tây bắc cấp 6, có lúc cấp 7, giật trên cấp 7; biển động. Sóng biển cao: 2,0-3,0m.

Cảnh báo cấp độ rủi ro thiên tai do gió mạnh, sóng lớn trên biển: Cấp 1.

Nhiệt độ thấp nhất trong đợt rét này ở vùng đồng bằng và Nam Đông từ 14,0-16,0oC; vùng A Lưới 11,0-13,0 oC.

Tin phát lúc: 9h30

Nguồn: Đài KTTV tỉnh",
					'created_at' => today(),
					'updated_at' => today(),
				];
			}
		}

		DB::table('post')->insert($data);
	}
}
