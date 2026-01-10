<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Rings\RingTypes\Pipelines;

use Domain\JewelleryProperties\Rings\RingTypes\Models\RingType;
use Domain\Shared\AbstractPipeline;
use Illuminate\Database\Eloquent\Model;

final class RingTypePipeline extends AbstractPipeline
{

    /**
     * @inheritDoc
     */
    public function store(array $data): Model|RingType
    {
        // TODO: Implement store() method.
    }

    /**
     * @inheritDoc
     */
    public function update(array $data, int $id): void
    {
        // TODO: Implement update() method.
    }

    /**
     * @inheritDoc
     */
    public function destroy(int $id): void
    {
        // TODO: Implement destroy() method.
    }
}
