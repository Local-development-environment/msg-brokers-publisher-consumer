<?php

declare(strict_types=1);

namespace Domain\Medias\MediaPictures\Pictures\Services\Relationships;

use Domain\Medias\MediaPictures\Pictures\Repositories\Relationships\PicturesProducerRelationshipRepository;
use Domain\Medias\Shared\Producers\Models\Producer;

final class PicturesProducerRelationshipService
{
    public function __construct(public PicturesProducerRelationshipRepository $repository)
    {
    }

    public function index($id): Producer
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}