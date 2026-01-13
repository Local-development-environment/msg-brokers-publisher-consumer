<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\CharmPendants\CharmPendants\Pipelines;

use Domain\JewelleryProperties\CharmPendants\CharmPendants\Models\CharmPendant;
use Domain\Shared\AbstractPipeline;
use Illuminate\Database\Eloquent\Model;

final class CharmPendantPipeline extends AbstractPipeline
{

    /**
     * @inheritDoc
     */
    public function store(array $data): Model|CharmPendant
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
