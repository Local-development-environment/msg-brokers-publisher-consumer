<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadMetrics\Pipelines\Pipes;

use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadMetrics\Repositories\BeadMetricRepository;

final class BeadMetricStorePipe
{
    public function __construct(public BeadMetricRepository $repository)
    {
    }

    public function handle(array $data, \Closure $next): mixed
    {
        $model = $this->repository->store(data_get($data, 'data.attributes'));

        data_set($data, 'model', $model);
        data_set($data, 'id', $model->id);

        return $next($data);
    }
}
