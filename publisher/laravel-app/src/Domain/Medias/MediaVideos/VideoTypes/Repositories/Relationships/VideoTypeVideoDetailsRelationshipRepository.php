<?php

declare(strict_types=1);

namespace Domain\Medias\MediaVideos\VideoTypes\Repositories\Relationships;

use Domain\Medias\MediaVideos\VideoTypes\Models\VideoType;
use Illuminate\Database\Eloquent\Collection;

final class VideoTypeVideoDetailsRelationshipRepository
{
    public function index(int $id): Collection
    {
        return VideoType::findOrFail($id)->videoDetails;
    }

    public function update(array $data, int $id): void
    {

    }
}