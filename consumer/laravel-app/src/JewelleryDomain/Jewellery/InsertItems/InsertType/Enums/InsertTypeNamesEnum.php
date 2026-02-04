<?php

namespace JewelleryDomain\Jewellery\InsertItems\InsertType\Enums;

enum InsertTypeNamesEnum: string
{
    case STONE     = 'камень';
    case BEAD_ITEM = 'бусина';

    public function description(): string
    {
        return match ($this) {
            self::STONE     => 'Вставка является камнем (природный, выращенный, имитация)',
            self::BEAD_ITEM => 'Вставка является бусиной, изготовленной из камня',
        };
    }
}
