<?php

namespace App\Enum;

enum PostStatusEnum: string
{
    case Published = 'published';
    case Draft = 'draft';
    case Pending = 'pending';
}
