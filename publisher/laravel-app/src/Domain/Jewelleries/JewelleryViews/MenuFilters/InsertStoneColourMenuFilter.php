<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryViews\MenuFilters;

use Domain\Inserts\Colours\Enums\ColourEnum;
use Domain\Jewelleries\JewelleryViews\Enums\VJewelleryEnum;
use Spatie\QueryBuilder\QueryBuilder;

final class InsertStoneColourMenuFilter
{
    public function __invoke(QueryBuilder $queryBuilder): array
    {
        return $queryBuilder
//            ->whereNotNull(VJewelleryEnum::FK_STONE_COLOUR->value)
            ->join(ColourEnum::TABLE_NAME->value . ' as jil', 'dominant_colour_id', '=', 'jil.id')
            ->select('jil.id', 'jil.name')
            ->groupBy('jil.id')
            ->orderBy('jil.id')
            ->get()
            ->toArray();
    }
}