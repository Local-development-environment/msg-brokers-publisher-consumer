<?php

declare(strict_types=1);

namespace Domain\Medias\Shared\MediaTypes\Enums;

enum MediaTypeBuilderEnum: string
{
    case PICTURE = 'pictures';
    case VIDEO  = 'videos';
}
