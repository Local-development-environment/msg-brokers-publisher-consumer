<?php

declare(strict_types=1);

namespace Domain\PreciousMetals\ColourCombinations\Enums;

enum ColourCombinationEnum: string
{
    case TYPE_RESOURCE = 'colourCombinations';
    case TABLE_NAME    = 'jw_metals.colour_combinations';
    case PRIMARY_KEY   = 'id';
}
