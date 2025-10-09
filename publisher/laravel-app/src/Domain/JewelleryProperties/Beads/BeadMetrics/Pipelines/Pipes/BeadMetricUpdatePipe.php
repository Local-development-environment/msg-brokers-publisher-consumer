<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadMetrics\Pipelines\Pipes;

use Domain\JewelleryProperties\Beads\BeadMetrics\Repositories\BeadMetricRepository;

final class BeadMetricUpdatePipe
{
    public function __construct(public BeadMetricRepository $repository)
    {
    }

    public function handle(array $data, \Closure $next): mixed
    {
        $this->repository->update(data_get($data, 'data.attributes'), data_get($data, 'id'));

        return $next($data);
    }
}