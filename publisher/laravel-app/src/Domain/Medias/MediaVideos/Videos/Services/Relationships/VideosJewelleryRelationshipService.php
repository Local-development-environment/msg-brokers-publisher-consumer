<?php

declare(strict_types=1);

namespace Domain\Medias\MediaVideos\Videos\Services\Relationships;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\Medias\MediaVideos\Videos\Repositories\Relationships\VideosJewelleryRelationshipRepository;

final class VideosJewelleryRelationshipService
{
    public function __construct(public VideosJewelleryRelationshipRepository $repository)
    {
    }

    public function index($id): Jewellery
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}