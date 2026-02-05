<?php

declare(strict_types=1);

namespace UserDomain\Users\VAdmins\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use UserDomain\Users\VAdmins\Enums\VAdminEnum;
use UserDomain\Users\VAdmins\Models\VAdmin;

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
