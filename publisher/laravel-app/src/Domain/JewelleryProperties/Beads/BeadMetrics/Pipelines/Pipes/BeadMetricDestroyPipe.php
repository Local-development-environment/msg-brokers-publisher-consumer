<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadMetrics\Pipelines\Pipes;

use Domain\JewelleryProperties\Beads\BeadMetrics\Repositories\BeadMetricRepository;

final class BeadMetricDestroyPipe
{
    public function __construct(public BeadMetricRepository $repository)
    {
    }

    public function handle(int $id, \Closure $next): mixed
    {
        $this->repository->destroy($id);

        return $next($id);
    }
}