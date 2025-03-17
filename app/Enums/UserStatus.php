<?php

namespace App\Enums;

enum UserStatus:int
{
    //
    case choPheDuyet = 0;
    case duocPheDuyet = 1;
    case biTuChoi = 2;
    case biKhoa = 3;

    public function label():string
    {
        return match ($this) {
            self::choPheDuyet => 'Chờ phê duyệt',
            self::duocPheDuyet => 'Được phê duyệt',
            self::biTuChoi => 'Bị từ chối',
            self::biKhoa => 'Bị khoá',
        };
    }
}
