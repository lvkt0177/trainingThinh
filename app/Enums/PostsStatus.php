<?php

namespace App\Enums;

enum PostsStatus:int
{
    //
    case choPheDuyet = 0;
    case pheDuyet = 1;


    public function label():string
    {
        return match ($this) {
            self::choPheDuyet => 'Chờ phê duyệt',
            self::pheDuyet => 'Phê duyệt',
        };
    }
}
