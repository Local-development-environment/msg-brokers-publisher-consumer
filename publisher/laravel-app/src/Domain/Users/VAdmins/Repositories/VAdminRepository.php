<?php

declare(strict_types=1);

namespace Domain\Users\VAdmins\Repositories;

use Domain\Users\VAdmins\Enums\VAdminEnum;
use Domain\Users\VAdmins\Models\VAdmin;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class VAdminRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(VAdmin::class)
            ->allowedFilters([
                AllowedFilter::exact(VAdminEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function show(array $data, int $id): VAdmin
    {
        return QueryBuilder::for(VAdmin::class)
            ->where(VAdminEnum::PRIMARY_KEY->value, $id)
            ->firstOrFail();
    }
}