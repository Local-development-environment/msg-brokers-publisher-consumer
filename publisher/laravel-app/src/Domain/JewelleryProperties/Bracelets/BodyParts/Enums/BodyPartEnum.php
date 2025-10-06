<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BodyParts\Enums;

enum BodyPartEnum: string
{
    case TYPE_RESOURCE = 'bodyParts';
    case TABLE_NAME = 'jw_properties.body_parts';
    case PRIMARY_KEY   = 'id';
}
