<?php

declare(strict_types=1);

namespace Domain\Medias\Shared\MediaTypes\Repositories\Relationships;

use Domain\Medias\Shared\MediaTypes\Models\MediaType;
use Illuminate\Database\Eloquent\Collection;

final class MediaTypeMediaReviewsRelationshipRepository
{
    public function index(int $id): Collection
    {
        return MediaType::findOrFail($id)->mediaReviews;
    }

    public function update(array $data, int $id): void
    {

    }
}