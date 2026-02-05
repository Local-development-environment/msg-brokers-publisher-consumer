<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\Shared\MediaTypes\Repositories\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\Medias\Shared\MediaTypes\Models\MediaType;

final class MediaTypeMediaCatalogsRelationshipRepository
{
    public function index(int $id): Collection
    {
        return MediaType::findOrFail($id)->mediaCatalogs;
    }

    public function update(array $data, int $id): void
    {

    }
}
