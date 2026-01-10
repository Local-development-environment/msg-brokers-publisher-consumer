<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Rings\RingMetrics\Pipelines;

use Domain\JewelleryProperties\Rings\RingMetrics\Models\RingMetric;
use Domain\Shared\AbstractPipeline;
use Illuminate\Database\Eloquent\Model;

final class RingMetricPipeline extends AbstractPipeline
{

    /**
     * @inheritDoc
     */
    public function store(array $data): Model|RingMetric
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
