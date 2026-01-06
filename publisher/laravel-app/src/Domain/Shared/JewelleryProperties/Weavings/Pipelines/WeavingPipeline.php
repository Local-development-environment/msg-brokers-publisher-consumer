<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\Weavings\Pipelines;

use Domain\Shared\AbstractPipeline;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\Enum;

final class WeavingPipeline extends AbstractPipeline
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
