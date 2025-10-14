<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\Clasps\Enums;

enum ClaspListEnum: string
{
    case CARABINER = 'карабин';
    case SPRING    = 'шпрингель';
    case BOX       = 'коробка';
    case THREADED  = 'резьбовой';
    case MAGNETIC  = 'магнитный';
    case TOGGLE    = 'тоггл';
    case HOOK      = 'крючок';
    case BOLO      = 'боло';
    case FOLDOVER  = 'складной';
    case SLIDER    = 'слайдер';
    case NO_CLASP  = 'без замка';
}
