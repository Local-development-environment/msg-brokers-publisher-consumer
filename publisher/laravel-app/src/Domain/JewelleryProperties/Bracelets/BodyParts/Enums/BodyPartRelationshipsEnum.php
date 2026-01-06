<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BodyParts\Enums;

enum BodyPartRelationshipsEnum: string
{
    case CLASPS         = 'clasps';
    case BRACELET_BASES = 'braceletBases';
    case BRACELETS      = 'bracelets';
}
