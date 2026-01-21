<?php

namespace JewelleryDomain\Jewellery\SpecProperties\Bracelets\BodyPart\Enums;

enum BodyPartNamesEnum: string
{
    case WRIST = 'запястье';
    case ANKLE = 'щиколотка';

    public function jwProbability(): int
    {
        return match ($this) {
            self::WRIST => 90,
            self::ANKLE => 10,
        };
    }
}
