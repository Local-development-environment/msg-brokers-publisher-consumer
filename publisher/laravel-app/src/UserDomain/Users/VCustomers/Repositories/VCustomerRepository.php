<?php

declare(strict_types=1);

namespace UserDomain\Users\VCustomers\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use UserDomain\Users\VCustomers\Enums\VCustomerEnum;
use UserDomain\Users\VCustomers\Models\VCustomer;

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
