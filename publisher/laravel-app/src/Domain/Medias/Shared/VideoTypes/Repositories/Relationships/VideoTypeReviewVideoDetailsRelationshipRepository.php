<?php

declare(strict_types=1);

namespace Domain\Medias\Shared\VideoTypes\Repositories\Relationships;

use Domain\Medias\Shared\VideoTypes\Models\VideoType;
use Illuminate\Database\Eloquent\Collection;

final class VideoTypeReviewVideoDetailsRelationshipRepository
{
    public function index(int $id): Collection
    {
        return VideoType::findOrFail($id)->reviewVideoDetails;
    }

    public function update(array $data, int $id): void
    {

    }
}