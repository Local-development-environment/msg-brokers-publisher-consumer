<?php

declare(strict_types=1);

namespace Domain\Shared\CustomSorts;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Sorts\Sort;

final class InsertStoneSort implements Sort
{
    public function __invoke(Builder $query, bool $descending, string $property)
    {
        // TODO: Implement __invoke() method.
    }
}