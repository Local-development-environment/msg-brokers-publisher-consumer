<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\Shared\MediaTypes\Services\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\Medias\Shared\MediaTypes\Repositories\Relationships\MediaTypeMediaReviewsRelationshipRepository;

final class MediaTypeReviewMediasRelationshipService
{
    public function __construct(public MediaTypeMediaReviewsRelationshipRepository $repository)
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
