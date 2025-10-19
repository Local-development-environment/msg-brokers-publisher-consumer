<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Pipelines\Pipelines;

use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Repositories\NecklaceMetricRepository;

final class NecklaceMetricUpdatePipe
{
    public function __construct(public NecklaceMetricRepository $repository)
    {
    }

    public function handle(array $data, \Closure $next): mixed
    {
        $this->repository->update(data_get($data, 'data.attributes'), data_get($data, 'id'));

        return $next($data);
    }
}