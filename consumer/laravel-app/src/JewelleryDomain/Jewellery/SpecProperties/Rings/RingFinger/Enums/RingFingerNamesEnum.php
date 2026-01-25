<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewellery\SpecProperties\Rings\RingFinger\Enums;

enum RingFingerNamesEnum: string
{
    case TOE    = 'палец ноги';
    case FINGER = 'палец руки';

    public function jwProbability(): int
    {
        return match ($this) {
            self::FINGER => 90,
            self::TOE => 10,
        };
    }
}
