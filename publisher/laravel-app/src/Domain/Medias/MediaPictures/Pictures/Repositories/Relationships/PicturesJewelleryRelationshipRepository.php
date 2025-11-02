<?php

declare(strict_types=1);

namespace Domain\Medias\MediaPictures\Pictures\Repositories\Relationships;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\Medias\MediaPictures\Pictures\Models\Picture;

final class PicturesJewelleryRelationshipRepository
{
    public function index(int $id): Jewellery
    {
        return Picture::findOrFail($id)->jewellery;
    }

    public function update(array $data, int $id): void
    {

    }
}