<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Rings\RingSizes\Pipelines;

use Domain\JewelleryProperties\Rings\RingSizes\Models\RingSize;
use Domain\Shared\AbstractPipeline;
use Illuminate\Database\Eloquent\Model;

final class RingSizePipeline extends AbstractPipeline
{

    /**
     * @inheritDoc
     */
    public function store(array $data): Model|RingSize
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
