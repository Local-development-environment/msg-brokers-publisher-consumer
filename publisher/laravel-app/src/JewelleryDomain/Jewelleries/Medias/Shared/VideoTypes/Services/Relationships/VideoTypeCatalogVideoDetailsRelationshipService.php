<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\Shared\VideoTypes\Services\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\Medias\Shared\VideoTypes\Repositories\Relationships\VideoTypeCatalogVideoDetailsRelationshipRepository;

final class VideoTypeCatalogVideoDetailsRelationshipService
{
    public function __construct(public VideoTypeCatalogVideoDetailsRelationshipRepository $repository)
    {
    }

    public function index($id): Collection
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}
