<?php

declare(strict_types=1);

namespace Domain\Medias\Shared\Producers\Services\Relationships;

use Domain\Medias\Shared\Producers\Models\Producer;
use Illuminate\Database\Eloquent\Collection;

final class ProducerVideosRelationshipService
{
    public function index(int $id): Collection
    {
        return Producer::findOrFail($id)->videos;
    }

    public function update(array $data, int $id): void
    {

    }
}