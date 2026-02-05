<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogMedias\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogMedias\Enums\CatalogMediaEnum;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogMedias\Enums\CatalogMediaRelationshipsEnum;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogMedias\Models\CatalogMedia;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class CatalogMediaRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(CatalogMedia::class)
                           ->allowedIncludes([
                               CatalogMediaRelationshipsEnum::JEWELLERY->value,
                               CatalogMediaRelationshipsEnum::MEDIA_TYPE->value,
                               CatalogMediaRelationshipsEnum::CATALOG_PICTURE->value,
                               CatalogMediaRelationshipsEnum::CATALOG_VIDEO->value,
                           ])
                           ->allowedFilters([
                               AllowedFilter::exact(CatalogMediaEnum::PRIMARY_KEY->value)
                           ])
                           ->paginate($data['per_page'] ?? null)
                           ->appends($data);
    }

    public function store(array $data): CatalogMedia
    {
        return CatalogMedia::create($data);
    }

    public function show(array $data, int $id): CatalogMedia
    {
        return QueryBuilder::for(CatalogMedia::class)
                           ->where(CatalogMediaEnum::PRIMARY_KEY->value, $id)
                           ->allowedIncludes([
                               CatalogMediaRelationshipsEnum::JEWELLERY->value,
                               CatalogMediaRelationshipsEnum::MEDIA_TYPE->value,
                               CatalogMediaRelationshipsEnum::CATALOG_PICTURE->value,
                               CatalogMediaRelationshipsEnum::CATALOG_VIDEO->value,
                           ])
                           ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        CatalogMedia::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        CatalogMedia::findOrFail($id)->delete();
    }
}
