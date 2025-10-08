<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadBases\Pipelines\Pipes;

use Domain\JewelleryProperties\Beads\BeadBases\Repositories\BeadBaseRepository;

final class BeadBaseDestroyPipe
{
    public function __construct(public BeadBaseRepository $repository)
    {
    }

    public function handle(int $id, \Closure $next): mixed
    {
        $this->repository->destroy($id);

        return $next($id);
    }
}