<?php

declare(strict_types=1);

namespace Domain\Medias\MediaPictures\Pictures\Repositories\Relationships;

use Domain\Medias\MediaPictures\Pictures\Models\Picture;
use Domain\Medias\Shared\Producers\Models\Producer;

final class PicturesJewelleryRelationshipRepository
{
    public function index(int $id): Producer
    {
        return Picture::findOrFail($id)->producer;
    }

    public function update(array $data, int $id): void
    {

    }
}