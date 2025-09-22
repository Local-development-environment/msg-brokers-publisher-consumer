<?php

declare(strict_types=1);

namespace Domain\Users\VEmployees\Repositories;

use Domain\Users\VEmployees\Enums\VEmployeeEnum;
use Domain\Users\VEmployees\Models\VEmployee;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class VEmployeeRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(VEmployee::class)
            ->allowedFilters([
                AllowedFilter::exact(VEmployeeEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function show(array $data, int $id): VEmployee
    {
        return QueryBuilder::for(VEmployee::class)
            ->where(VEmployeeEnum::PRIMARY_KEY->value, $id)
            ->firstOrFail();
    }
}