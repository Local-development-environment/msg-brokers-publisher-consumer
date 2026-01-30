<?php

namespace Domain\JewelleryProperties\Bracelets\BraceletGroups\Enums;

use Domain\JewelleryProperties\Bracelets\BraceletTypes\Enums\BraceletTypeBuilderEnum;

enum BraceletGroupBuilderEnum: string
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
                BraceletTypeBuilderEnum::BEADED->value,
                BraceletTypeBuilderEnum::WICKER->value,
                BraceletTypeBuilderEnum::GLIDER->value,
                BraceletTypeBuilderEnum::CHAINED->value,
                BraceletTypeBuilderEnum::SLAVE->value,
            ],
            self::HARD => [
                BraceletTypeBuilderEnum::HOOP->value,
                BraceletTypeBuilderEnum::OPEN_RING->value,
                BraceletTypeBuilderEnum::SWIVEL->value,
                BraceletTypeBuilderEnum::SPIRAL->value,
                BraceletTypeBuilderEnum::CUFF->value,
            ],
        };
    }
}
