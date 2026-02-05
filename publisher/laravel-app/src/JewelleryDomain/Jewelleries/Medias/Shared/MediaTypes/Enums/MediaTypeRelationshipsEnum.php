<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\Shared\MediaTypes\Enums;

enum MediaTypeRelationshipsEnum: string
{
    case CATALOG_MEDIAS = 'catalogMedias';
    case REVIEW_MEDIAS = 'reviewMedias';
}
