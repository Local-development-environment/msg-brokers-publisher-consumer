<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletTypes\Enums;

enum BraceletTypeRelationshipsEnum: string
{
    case CLASPS         = 'clasps';
    case BODY_PARTS = 'bodyParts';
    case BRACELETS      = 'bracelets';
}
