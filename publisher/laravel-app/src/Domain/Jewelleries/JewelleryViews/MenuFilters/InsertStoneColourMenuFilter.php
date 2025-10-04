<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryViews\MenuFilters;

use Domain\Inserts\StoneColours\Enums\StoneColourEnum;
use Domain\Jewelleries\JewelleryViews\Enums\VJewelleryEnum;
use Spatie\QueryBuilder\QueryBuilder;

final class InsertStoneColourMenuFilter
{
    public function __invoke(QueryBuilder $queryBuilder): array
    {
        return $queryBuilder
//            ->whereNotNull(VJewelleryEnum::FK_STONE_COLOUR->value)
            ->join(StoneColourEnum::TABLE_NAME->value . ' as jil', VJewelleryEnum::FK_STONE_COLOUR->value, '=', 'jil.id')
            ->select('jil.id', 'jil.name')
            ->groupBy('jil.id')
            ->orderBy('jil.id')
            ->get()
            ->toArray();
    }
}