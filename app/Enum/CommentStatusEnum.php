<?php

namespace App\Enum;

enum CommentStatusEnum: int
{
    case Pending = 0;
    case Approved = 1;
    case Rejected = 2;
}
