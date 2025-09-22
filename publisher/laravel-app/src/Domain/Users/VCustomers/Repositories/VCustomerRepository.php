<?php

declare(strict_types=1);

namespace Domain\Users\VCustomers\Repositories;

use Domain\Users\VCustomers\Enums\VCustomerEnum;
use Domain\Users\VCustomers\Models\VCustomer;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class VCustomerRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(VCustomer::class)
            ->allowedFilters([
                AllowedFilter::exact(VCustomerEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function show(array $data, int $id): VCustomer
    {
        return QueryBuilder::for(VCustomer::class)
            ->where(VCustomerEnum::PRIMARY_KEY->value, $id)
            ->firstOrFail();
    }
}