<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Brooches\Brooches\Repositories;

use Domain\JewelleryProperties\Brooches\Brooches\Enums\BroochEnum;
use Domain\JewelleryProperties\Brooches\Brooches\Enums\BroochRelationshipsEnum;
use Domain\JewelleryProperties\Brooches\Brooches\Models\Brooch;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class BroochRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(Brooch::class)
            ->allowedIncludes([
                BroochRelationshipsEnum::JEWELLERY->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(BroochEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): Brooch
    {
        return Brooch::create($data);
    }

    public function show(array $data, int $id): Brooch
    {
        return QueryBuilder::for(Brooch::class)
            ->where(BroochEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                BroochRelationshipsEnum::JEWELLERY->value
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        Brooch::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        Brooch::findOrFail($id)->delete();
    }
}