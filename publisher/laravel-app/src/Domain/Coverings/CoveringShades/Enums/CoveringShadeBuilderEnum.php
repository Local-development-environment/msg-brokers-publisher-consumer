<?php

declare(strict_types=1);

namespace Domain\Coverings\CoveringShades\Enums;

enum CoveringShadeBuilderEnum: string
{
    case BLACKENING         = 'черненый';
    case RHODIUM_LIGHT_GRAY = 'яркий светло-серый';
    case PLATINUM_WHITE     = 'серебристо-белый';
    case GOLDEN_PINK        = 'розовое золото';
    case GOLDEN_YELLOW      = 'желтое золото';
    case GOLDEN_RED         = 'красное золото';
    case NO_SHADE           = 'без оттенка';
    case ENAMEL_COLOUR      = 'цвет эмали';

    public function description(): string
    {
        return match ($this) {
            self::BLACKENING         => 'Глубокий черный оттенок, который может быть как однородным, так и с разводами. Создавая эффект старения',
            self::RHODIUM_LIGHT_GRAY => 'Родиевое покрытие придает яркий светло-серый оттенок, создавая эффект белого золота',
            self::GOLDEN_PINK        => 'Розово-золотой оттенок создает эффект розового золота',
            self::GOLDEN_YELLOW      => 'Желто-золотой оттенок создает эффект желтого золота',
            self::GOLDEN_RED         => 'Красно-золотой оттенок создает эффект красного золота',
            self::PLATINUM_WHITE     => 'Платиновый оттенок белого цвета, чуть темнее серебра, создает эффект белого золота',
            self::NO_SHADE           => 'Покрытие не добавляет оттенков к существующему цвету',
            self::ENAMEL_COLOUR      => 'Покрытие имеет цвет эмали'
        };
    }

    public function probability(): int
    {
        return match ($this) {
            self::BLACKENING => throw new \Exception('To be implemented'),
            self::RHODIUM_LIGHT_GRAY => throw new \Exception('To be implemented'),
            self::GOLDEN_PINK => throw new \Exception('To be implemented'),
            self::GOLDEN_YELLOW => throw new \Exception('To be implemented'),
            self::GOLDEN_RED => throw new \Exception('To be implemented'),
            self::PLATINUM_WHITE => throw new \Exception('To be implemented'),
            self::NO_SHADE => throw new \Exception('To be implemented'),
            self::ENAMEL_COLOUR => throw new \Exception('To be implemented'),
        };
    }
}
