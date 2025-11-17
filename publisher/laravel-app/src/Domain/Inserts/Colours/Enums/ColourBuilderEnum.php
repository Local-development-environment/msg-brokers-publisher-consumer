<?php

declare(strict_types=1);

namespace Domain\Inserts\Colours\Enums;

enum ColourBuilderEnum: string
{
    case GREEN            = 'зеленый';
    case RED              = 'красный';
    case BLUE             = 'синий';
    case PINK             = 'розовый';
    case LIGHT_BLUE       = 'голубой';
    case MAGENTA          = 'пурпурный';
    case YELLOW           = 'желтый';
    case WHITE            = 'белый';
    case BLACK            = 'черный';
    case RAINBOW_COLOURED = 'радужный';
    case GARNET           = 'гранатовый';
    case COLOURLESS       = 'бесцветный';
    case LILAC            = 'сиреневый';
    case BROWN            = 'коричневый';
    case GREEN_BLUE       = 'зелено-синий';
    case PURPLE           = 'фиолетовый';
    case MULTI_COLOUR     = 'многоцветный';
    case ORANGE           = 'оранжевый';
    case GRAY             = 'серый';

    public function description(): string
    {
        return match ($this) {
            self::GREEN => '',
            self::RED => '',
            self::BLUE => '',
            self::PINK => '',
            self::LIGHT_BLUE => '',
            self::MAGENTA => '',
            self::YELLOW => '',
            self::WHITE => '',
            self::BLACK => '',
            self::RAINBOW_COLOURED => '',
            self::GARNET => '',
            self::COLOURLESS => '',
            self::LILAC => '',
            self::BROWN => '',
            self::GREEN_BLUE => '',
            self::PURPLE => '',
            self::MULTI_COLOUR => '',
            self::ORANGE => '',
            self::GRAY => '',
        };
    }
}
