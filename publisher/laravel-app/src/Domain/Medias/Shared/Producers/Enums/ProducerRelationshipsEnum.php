<?php

declare(strict_types=1);

namespace Domain\Medias\Shared\Producers\Enums;

enum ProducerRelationshipsEnum: string
{
    case VIDEOS = 'videos';
    case PICTURES = 'pictures';
}
