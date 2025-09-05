<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryViews\MenuFilters;

use Spatie\QueryBuilder\QueryBuilder;

interface MenuFilterInterface
{
    public function __invoke(QueryBuilder $queryBuilder): array;
}