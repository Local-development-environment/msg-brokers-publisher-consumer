<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletTypes\Enums;

enum BraceletTypeBuilderEnum: string
{
    case HOOP      = 'обруч';
    case OPEN_RING = 'размкнутое кольцо';
    case SWIVEL    = 'шарнирный';
    case SPIRAL        = 'спираль';
    case CUFF          = 'манжета';
    case CHAINED       = 'цепочка';
    case GLIDER        = 'глидерный';
    case WICKER        = 'плетеный';
    case SLAVE         = 'слейв';

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
            self::CHAINED   => 50,
            self::GLIDER    => 5,
            self::WICKER    => 5,
            self::SLAVE     => 5,
        };
    }
}
