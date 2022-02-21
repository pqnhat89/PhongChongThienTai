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
}
