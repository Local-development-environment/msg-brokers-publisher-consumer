<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Piercings\Piercings\Repositories;

use Domain\JewelleryProperties\Piercings\Piercings\Enums\PiercingEnum;
use Domain\JewelleryProperties\Piercings\Piercings\Enums\PiercingRelationshipsEnum;
use Domain\JewelleryProperties\Piercings\Piercings\Models\Piercing;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class PiercingRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(Piercing::class)
            ->allowedIncludes([
                PiercingRelationshipsEnum::JEWELLERY->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(PiercingEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): Piercing
    {
        return Piercing::create($data);
    }

    public function show(array $data, int $id): Piercing
    {
        return QueryBuilder::for(Piercing::class)
            ->where(PiercingEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                PiercingRelationshipsEnum::JEWELLERY->value
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        Piercing::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        Piercing::findOrFail($id)->delete();
    }
}