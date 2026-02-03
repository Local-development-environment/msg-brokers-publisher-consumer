<?php

namespace JewelleryDomain\Jewellery\BeadItems\BeadItem\Enums;

use JewelleryDomain\Jewellery\Stones\Stone\Enums\StoneNamesEnum;

enum BeadItemNamesEnum: string
{
    case NATURAL_SEA_PEARL_BEAD    = 'жемчуг морской натурадьный';
    case CULTURED_SEA_PEARLS_BEAD  = 'жемчуг морской культивированный';
    case NATURAL_RIVER_PEARLS_BEAD = 'жемчуг речной натуральный';
    case CULTURED_RIVER_PEARLS     = 'жемчуг речной культивированный';
    case RHINESTONE_BEAD           = 'горный хрусталь';
    case SMOKEY_QUARTZ_BEAD        = 'кварц дымчатый';
    case SNOW_QUARTZ_BEAD          = 'кварц льдистый';
    case ROSE_QUARTZ_BEAD          = 'кварц розовый';
    case RUTILATED_QUARTZ_BEAD     = 'кварц рутиловый';
    case SHUNGITE_BEAD             = 'шунгит';
    case NEPHRITIS_BEAD            = 'нефрит';
    case CORAL_BEAD                = 'коралл';
    case RHODONITE_BEAD            = 'родонит';
    case TOURMALINE_PARAIBA_BEAD   = 'турмалин параиба';
    case RUBELLITE                 = 'рубеллит';
    case VERDELITE                 = 'верделит';
    case INDIGOLITE                = 'индиголит';
    case DRAVITE                   = 'дравит';
    case ACHROITE                  = 'ахроит';
    case POLYCHROME_TOURMALINE     = 'турмалин полихромный';
    case BLUE_TURQUOISE_BEAD       = 'бирюза голубая';
    case GREEN_TURQUOISE_BEAD      = 'бирюза зеленая';
    case MOTHER_PEARL_BEAD         = 'перламутр';


    public function description(): string
    {
        return match ($this) {
            self::NATURAL_SEA_PEARL_BEAD    => 'бусина изготовлена из натурального морского жемчуга',
            self::CULTURED_SEA_PEARLS_BEAD  => 'бусина изготовлена из культивированного морского жемчуга',
            self::NATURAL_RIVER_PEARLS_BEAD => 'бусина изготовлена из натурального речного жемчуга',
            self::CULTURED_RIVER_PEARLS     => 'бусина изготовлена из культивированного речного жемчуга',
            self::RHINESTONE_BEAD           => 'бусина изготовлена из горного хрусталя',
            self::SMOKEY_QUARTZ_BEAD        => 'бусина изготовлена из дымчатого кварца',
            self::SNOW_QUARTZ_BEAD          => 'бусина изготовлена из льдистого кварца',
            self::ROSE_QUARTZ_BEAD          => 'бусина изготовлена из розового кварца',
            self::RUTILATED_QUARTZ_BEAD     => 'бусина изготовлена из рутилового кварца',
            self::SHUNGITE_BEAD             => 'бусина изготовлена из шунгита',
            self::NEPHRITIS_BEAD            => 'бусина изготовлена из нефрита',
            self::CORAL_BEAD                => 'бусина изготовлена из коралла',
            self::RHODONITE_BEAD            => 'бусина изготовлена из родонита',
            self::TOURMALINE_PARAIBA_BEAD   => 'бусина изготовлена из турмалина параиба',
            self::RUBELLITE                 => 'бусина изготовлена из турмалина рубеллит',
            self::VERDELITE                 => 'бусина изготовлена из турмалина верделит',
            self::INDIGOLITE                => 'бусина изготовлена из турмалина индиголит',
            self::DRAVITE                   => 'бусина изготовлена из турмалина дравит',
            self::ACHROITE                  => 'бусина изготовлена из турмалина ахроит',
            self::POLYCHROME_TOURMALINE     => 'бусина изготовлена из полихромного турмалина',
            self::BLUE_TURQUOISE_BEAD       => 'бусина изготовлена из голубой бирюзы',
            self::GREEN_TURQUOISE_BEAD      => 'бусина изготовлена из зеленой бирюзы',
            self::MOTHER_PEARL_BEAD         => 'бусина изготовлена из перламутра',
        };
    }

    public function jwProbability(): int
    {
        return match ($this) {
            self::NATURAL_SEA_PEARL_BEAD    => 5,
            self::CULTURED_SEA_PEARLS_BEAD  => 3,
            self::NATURAL_RIVER_PEARLS_BEAD => 5,
            self::CULTURED_RIVER_PEARLS     => 2,
            self::RHINESTONE_BEAD           => 5,
            self::SMOKEY_QUARTZ_BEAD        => 4,
            self::SNOW_QUARTZ_BEAD          => 4,
            self::ROSE_QUARTZ_BEAD          => 4,
            self::RUTILATED_QUARTZ_BEAD     => 3,
            self::SHUNGITE_BEAD             => 5,
            self::NEPHRITIS_BEAD            => 5,
            self::CORAL_BEAD                => 5,
            self::RHODONITE_BEAD            => 5,
            self::TOURMALINE_PARAIBA_BEAD   => 5,
            self::RUBELLITE                 => 4,
            self::VERDELITE                 => 4,
            self::INDIGOLITE                => 4,
            self::DRAVITE                   => 4,
            self::ACHROITE                  => 4,
            self::POLYCHROME_TOURMALINE     => 5,
            self::BLUE_TURQUOISE_BEAD       => 5,
            self::GREEN_TURQUOISE_BEAD      => 5,
            self::MOTHER_PEARL_BEAD         => 5,
        };
    }

    public function stones(): string
    {
        return match ($this) {
            self::NATURAL_SEA_PEARL_BEAD    => StoneNamesEnum::NATURAL_SEA_PEARL->value,
            self::CULTURED_SEA_PEARLS_BEAD  => StoneNamesEnum::CULTURED_SEA_PEARLS->value,
            self::NATURAL_RIVER_PEARLS_BEAD => StoneNamesEnum::NATURAL_RIVER_PEARLS->value,
            self::CULTURED_RIVER_PEARLS     => StoneNamesEnum::CULTURED_RIVER_PEARLS->value,
            self::RHINESTONE_BEAD           => StoneNamesEnum::RHINESTONE->value,
            self::SMOKEY_QUARTZ_BEAD        => StoneNamesEnum::SMOKEY_QUARTZ->value,
            self::SNOW_QUARTZ_BEAD          => StoneNamesEnum::SNOW_QUARTZ->value,
            self::ROSE_QUARTZ_BEAD          => StoneNamesEnum::ROSE_QUARTZ->value,
            self::RUTILATED_QUARTZ_BEAD     => StoneNamesEnum::RUTILATED_QUARTZ->value,
            self::SHUNGITE_BEAD             => StoneNamesEnum::SHUNGITE->value,
            self::NEPHRITIS_BEAD            => StoneNamesEnum::NEPHRITIS->value,
            self::CORAL_BEAD                => StoneNamesEnum::CORAL->value,
            self::RHODONITE_BEAD            => StoneNamesEnum::RHODONITE->value,
            self::TOURMALINE_PARAIBA_BEAD   => StoneNamesEnum::PARAIBA_TOURMALINE->value,
            self::RUBELLITE                 => StoneNamesEnum::RUBELLITE->value,
            self::VERDELITE                 => StoneNamesEnum::VERDELITE->value,
            self::INDIGOLITE                => StoneNamesEnum::INDIGOLITE->value,
            self::DRAVITE                   => StoneNamesEnum::DRAVITE->value,
            self::ACHROITE                  => StoneNamesEnum::ACHROITE->value,
            self::POLYCHROME_TOURMALINE     => StoneNamesEnum::POLYCHROME_TOURMALINE->value,
            self::BLUE_TURQUOISE_BEAD       => StoneNamesEnum::BLUE_TURQUOISE->value,
            self::GREEN_TURQUOISE_BEAD      => StoneNamesEnum::GREEN_TURQUOISE->value,
            self::MOTHER_PEARL_BEAD         => StoneNamesEnum::MOTHER_PEARL->value,
        };
    }
}
