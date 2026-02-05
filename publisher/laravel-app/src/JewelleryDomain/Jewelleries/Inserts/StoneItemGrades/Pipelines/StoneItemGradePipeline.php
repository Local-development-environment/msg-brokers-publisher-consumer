<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneItemGrades\Pipelines;

use Domain\Shared\AbstractPipeline;
use Illuminate\Database\Eloquent\Model;

final class StoneItemGradePipeline extends AbstractPipeline
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
