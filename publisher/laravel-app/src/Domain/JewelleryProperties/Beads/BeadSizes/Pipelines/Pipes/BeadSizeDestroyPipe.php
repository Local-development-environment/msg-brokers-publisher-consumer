<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadSizes\Pipelines\Pipes;

use Domain\JewelleryProperties\Beads\BeadSizes\Repositories\BeadSizeRepository;

final class BeadSizeDestroyPipe
{
    public function __construct(public BeadSizeRepository $repository)
    {
    }

    public function handle(int $id, \Closure $next): mixed
    {
        $this->repository->destroy($id);

        return $next($id);
    }
}