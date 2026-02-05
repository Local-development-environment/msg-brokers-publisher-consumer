<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\Shared\VideoTypes\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\Medias\Shared\VideoTypes\Enums\VideoTypeEnum;
use JewelleryDomain\Jewelleries\Medias\Shared\VideoTypes\Enums\VideoTypeRelationshipsEnum;
use JewelleryDomain\Jewelleries\Medias\Shared\VideoTypes\Models\VideoType;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class VideoTypeRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(VideoType::class)
                           ->allowedIncludes([
                               VideoTypeRelationshipsEnum::CATALOG_VIDEO_DETAILS->value,
                               VideoTypeRelationshipsEnum::VIDEO_DETAILS->value,
                           ])
                           ->allowedFilters([
                               AllowedFilter::exact(VideoTypeEnum::PRIMARY_KEY->value)
                           ])
                           ->paginate($data['per_page'] ?? null)
                           ->appends($data);
    }

    public function store(array $data): VideoType
    {
        return VideoType::create($data);
    }

    public function show(array $data, int $id): VideoType
    {
        return QueryBuilder::for(VideoType::class)
                           ->where(VideoTypeEnum::PRIMARY_KEY->value, $id)
                           ->allowedIncludes([
                               VideoTypeRelationshipsEnum::CATALOG_VIDEO_DETAILS->value,
                               VideoTypeRelationshipsEnum::VIDEO_DETAILS->value,
                           ])
                           ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        VideoType::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        VideoType::findOrFail($id)->delete();
    }
}
