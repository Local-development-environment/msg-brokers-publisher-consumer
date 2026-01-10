<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Rings\RingFingers\Pipelines;

use Domain\JewelleryProperties\Rings\RingFingers\Models\RingFinger;
use Domain\Shared\AbstractPipeline;
use Illuminate\Database\Eloquent\Model;

final class RingFingerPipeline extends AbstractPipeline
{

    /**
     * @inheritDoc
     */
    public function store(array $data): Model|RingFinger
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
