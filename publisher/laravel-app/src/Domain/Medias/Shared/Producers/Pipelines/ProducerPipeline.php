<?php

declare(strict_types=1);

namespace Domain\Medias\Shared\Producers\Pipelines;

use Domain\Shared\AbstractPipeline;
use Illuminate\Database\Eloquent\Model;

final class ProducerPipeline extends AbstractPipeline
{

    public function store(array $data): Model
    {
        // TODO: Implement store() method.
    }

    public function update(array $data, int $id): void
    {
        // TODO: Implement update() method.
    }

    public function destroy(int $id): void
    {
        // TODO: Implement destroy() method.
    }
}