<?php

declare(strict_types=1);

namespace Domain\Medias\Shared\MediaTypes\Enums;

enum MediaTypeRelationshipsEnum: string
{
    case CATALOG_MEDIAS = 'catalogMedias';
    case REVIEW_MEDIAS = 'reviewMedias';
}
