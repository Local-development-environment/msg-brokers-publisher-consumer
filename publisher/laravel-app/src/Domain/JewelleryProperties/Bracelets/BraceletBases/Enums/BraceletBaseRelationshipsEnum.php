<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletBases\Enums;

enum BraceletBaseRelationshipsEnum: string
{
    case CLASPS         = 'clasps';
    case BODY_PARTS = 'bodyParts';
    case BRACELETS      = 'bracelets';
}
