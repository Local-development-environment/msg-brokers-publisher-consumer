<?php

declare(strict_types=1);

namespace Domain\Medias\MediaVideos\Videos\Repositories\Relationships;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\Medias\MediaVideos\Videos\Models\Video;

final class VideosJewelleryRelationshipRepository
{
    public function index(int $id): Jewellery
    {
        return Video::findOrFail($id)->jewellery;
    }

    public function update(array $data, int $id): void
    {

    }
}