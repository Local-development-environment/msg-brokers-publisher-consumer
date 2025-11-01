<?php

declare(strict_types=1);

namespace Domain\Medias\MediaPictures\Pictures\Repositories\Relationships;

use Domain\Medias\MediaPictures\Pictures\Models\Picture;
use Domain\Medias\Shared\Producers\Models\Producer;

final class PicturesProducerRelationshipRepository
{
    public function index(int $id): Producer
    {
        return Picture::findOrFail($id)->jewellery;
    }

    public function update(array $data, int $id): void
    {

    }
}