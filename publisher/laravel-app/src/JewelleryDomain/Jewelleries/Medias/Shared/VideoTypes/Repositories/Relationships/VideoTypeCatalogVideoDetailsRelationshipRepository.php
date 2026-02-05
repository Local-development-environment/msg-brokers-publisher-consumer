<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\Shared\VideoTypes\Repositories\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\Medias\Shared\VideoTypes\Models\VideoType;

final class VideoTypeCatalogVideoDetailsRelationshipRepository
{
    public function index(int $id): Collection
    {
        return VideoType::findOrFail($id)->catalogVideoDetails;
    }

    public function update(array $data, int $id): void
    {

    }
}
