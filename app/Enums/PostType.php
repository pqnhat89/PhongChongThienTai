<?php

namespace App\Enums;

use MyCLabs\Enum\Enum;

class PostType extends Enum
{
    const PAGE = 'Trang';
    const BTTT = 'Bản tin thiên tai';
    const VBCD_CDK = 'Văn bản chỉ đạo, công điện khẩn';
    const TTSK = 'Tin tức sự kiện';
    const VBCDDH = 'Văn bản chỉ đạo điều hành';
    const VBQPPL = 'Văn bản QPPL';
	const DBTT = 'Dự báo thời tiết';
	const KHPA = 'Kế hoạch, phương án PCTT';
	const DADA = 'Đề án, dự án';
	const QPCTT = 'Qũy phòng chống thiên tai';
	const TKTH = 'Thống kê thiệt hại';
	const BTTN = 'Bản tin thường niên';
	const TLTT = 'Tài liệu truyền thông';
}
