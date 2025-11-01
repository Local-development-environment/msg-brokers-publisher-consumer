<?php

declare(strict_types=1);

namespace Domain\Medias\MediaPictures\Pictures\Services\Relationships;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\Medias\MediaPictures\Pictures\Repositories\Relationships\PicturesJewelleryRelationshipRepository;

final class PicturesJewelleryRelationshipService
{
    public function __construct(public PicturesJewelleryRelationshipRepository $repository)
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