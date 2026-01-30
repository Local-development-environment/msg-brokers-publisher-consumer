<?php

namespace JewelleryDomain\Jewellery\SpecProperties\Bracelets\BraceletGroup\Enums;

use JewelleryDomain\Jewellery\SpecProperties\Bracelets\BraceletType\Enums\BraceletTypeNamesEnum;

enum BraceletGroupNamesEnum: string
{
    case SOFT = 'мягкий';
    case HARD = 'жесткий';

    public function jwProbability(): int
    {
        return match ($this) {
            self::SOFT => 50,
            self::HARD => 50,
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::HARD => 'Жесткий браслет — это ювелирное украшение с постоянной, неизменной формой (обруч, манжета), которое не гнется и сохраняет четкий контур.',
            self::SOFT => 'Мягкие браслеты отличаются гибкостью и подвижностью конструкции, они удобны в носке и способны принимать форму запястья.',
        };
    }

    public function types(): array
    {
        return match ($this) {
            self::SOFT => [
                BraceletTypeNamesEnum::BEADED->value,
                BraceletTypeNamesEnum::WICKER->value,
                BraceletTypeNamesEnum::GLIDER->value,
                BraceletTypeNamesEnum::CHAINED->value,
                BraceletTypeNamesEnum::SLAVE->value,
            ],
            self::HARD => [
                BraceletTypeNamesEnum::HOOP->value,
                BraceletTypeNamesEnum::OPEN_RING->value,
                BraceletTypeNamesEnum::SWIVEL->value,
                BraceletTypeNamesEnum::SPIRAL->value,
                BraceletTypeNamesEnum::CUFF->value,
            ],
        };
    }
}
