<?php

declare(strict_types=1);

namespace Domain\Medias\Shared\Producers\Repositories;

use Domain\Medias\Shared\Producers\Enums\ProducerEnum;
use Domain\Medias\Shared\Producers\Enums\ProducerRelationshipsEnum;
use Domain\Medias\Shared\Producers\Models\Producer;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class ProducerRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(Producer::class)
            ->allowedIncludes([
                ProducerRelationshipsEnum::VIDEOS->value,
                ProducerRelationshipsEnum::PICTURES->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(ProducerEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): Producer
    {
        return Producer::create($data);
    }

    public function show(array $data, int $id): Producer
    {
        return QueryBuilder::for(Producer::class)
            ->where(ProducerEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                ProducerRelationshipsEnum::VIDEOS->value,
                ProducerRelationshipsEnum::PICTURES->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        Producer::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        Producer::findOrFail($id)->delete();
    }
}