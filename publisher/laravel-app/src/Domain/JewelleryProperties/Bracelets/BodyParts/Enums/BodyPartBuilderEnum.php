<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BodyParts\Enums;

enum BodyPartBuilderEnum: string
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
