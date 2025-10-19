<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Pipelines\Pipelines;

use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Repositories\NecklaceMetricRepository;

final class NecklaceMetricDestroyPipe
{
    public function __construct(public NecklaceMetricRepository $repository)
    {
    }

    public function handle(int $id, \Closure $next): mixed
    {
        $this->repository->destroy($id);

        return $next($id);
    }
}