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
}
