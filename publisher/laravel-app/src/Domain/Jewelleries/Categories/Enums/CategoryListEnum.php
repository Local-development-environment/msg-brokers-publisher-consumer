<?php

declare(strict_types=1);

namespace Domain\Jewelleries\Categories\Enums;

enum CategoryListEnum: string
{
    case BEADS = 'бусы';
    case BRACELETS      = 'браслеты';
    case BROOCHES       = 'броши';
    case CHAINS         = 'цепи';
    case CHARM_PENDANTS = 'подвески-шарм';
    case CUFF_LINKS     = 'запонки';
    case EARRINGS       = 'серьги';
    case NECKLACES      = 'колье';
    case PENDANTS       = 'подвески';
    case PIERCINGS      = 'пирсинг';
    case RINGS          = 'кольца';
    case TIE_CLIPS      = 'зажимы для галстука';

    public function description(): string
    {
        return match ($this) {
            self::BEADS => 'описание бусы',
            self::BRACELETS => 'описание браслеты',
            self::BROOCHES => 'описание броши',
            self::CHAINS => 'описание цепи',
            self::CHARM_PENDANTS => 'описание шарм-подвески',
            self::CUFF_LINKS => 'описание запонки',
            self::EARRINGS => 'описание серьги',
            self::NECKLACES => 'описание ожерелье, колье',
            self::PENDANTS => 'описание подвески',
            self::PIERCINGS => 'описание пирсинга',
            self::RINGS => 'описание кольца',
            self::TIE_CLIPS => 'описание зажим для галстука'
        };
    }
}
