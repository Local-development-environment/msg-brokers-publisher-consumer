<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Rings\RingDetails\Pipelines;

use Domain\JewelleryProperties\Rings\RingDetails\Models\RingDetail;
use Domain\Shared\AbstractPipeline;
use Illuminate\Database\Eloquent\Model;

final class RingDetailPipeline extends AbstractPipeline
{

    /**
     * @inheritDoc
     */
    public function store(array $data): Model|RingDetail
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
