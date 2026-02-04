<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewellery\SpecProperties\Bracelets\BraceletType\Enums;

use JewelleryDomain\Jewellery\SpecProperties\Bracelets\BraceletGroup\Enums\BraceletGroupNamesEnum;

enum BraceletTypeNamesEnum: string
{
    case HOOP      = 'обруч';
    case OPEN_RING = 'разомкнутое кольцо';
    case SWIVEL    = 'шарнирный';
    case SPIRAL    = 'спираль';
    case CUFF      = 'манжета';
    case CHAINED   = 'цепочка';
    case GLIDER    = 'глидерный';
    case WICKER    = 'плетеный';
    case SLAVE     = 'слейв';
    case BEADED    = 'из бусин';

    public function description(): string
    {
        return match ($this) {
            self::HOOP      => 'Замкнутое жесткое кольцо.',
            self::OPEN_RING => 'Имеет просвет для надевания.',
            self::SWIVEL    => 'Две половины, соединенные подвижным шарниром.',
            self::SPIRAL    => 'Разомкнутые спиралевидные модели.',
            self::CUFF      => 'Широкая, часто разомкнутая пластина.',
            self::CHAINED   => 'Звенья разных форм, соединенные последовательно.',
            self::GLIDER    => 'Звенья соединены пружинами или шарнирами, часто растягиваются.',
            self::WICKER    => 'Из нитей, кожи, бисера.',
            self::SLAVE     => 'Соединен цепочкой с кольцом на палец.',
            self::BEADED    => 'Браслет собранный из бусин',
        };
    }

    public function jwProbability(): int
    {
        return match ($this) {
            self::HOOP      => 10,
            self::OPEN_RING => 10,
            self::SWIVEL    => 5,
            self::SPIRAL    => 5,
            self::CUFF      => 5,
            self::CHAINED   => 45,
            self::GLIDER    => 5,
            self::WICKER    => 5,
            self::SLAVE     => 5,
            self::BEADED    => 5,
        };
    }

    public function groups(): string
    {
        return match ($this) {
            self::HOOP,
            self::CUFF,
            self::SPIRAL,
            self::SWIVEL,
            self::OPEN_RING => BraceletGroupNamesEnum::HARD->value,
            self::CHAINED,
            self::GLIDER,
            self::WICKER,
            self::SLAVE,
            self::BEADED    => BraceletGroupNamesEnum::SOFT->value,
        };
    }
}
