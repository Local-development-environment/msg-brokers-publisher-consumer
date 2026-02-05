<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\BaseWeavings\Pipelines;

use Domain\Shared\AbstractPipeline;
use Illuminate\Database\Eloquent\Model;

final class BaseWeavingPipeline extends AbstractPipeline
{

    /**
     * @inheritDoc
     */
    public function store(array $data): Model
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
