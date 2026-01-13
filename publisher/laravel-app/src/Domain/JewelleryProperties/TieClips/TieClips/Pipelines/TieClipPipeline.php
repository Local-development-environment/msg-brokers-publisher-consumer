<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\TieClips\TieClips\Pipelines;

use Domain\JewelleryProperties\TieClips\TieClips\Models\TieClip;
use Domain\Shared\AbstractPipeline;
use Illuminate\Database\Eloquent\Model;

final class TieClipPipeline extends AbstractPipeline
{

    /**
     * @inheritDoc
     */
    public function store(array $data): Model|TieClip
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
