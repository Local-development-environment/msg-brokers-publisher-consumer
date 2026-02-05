<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\NecklaceMetrics\Pipelines\Pipelines;

use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\NecklaceMetrics\Repositories\NecklaceMetricRepository;

final class NecklaceMetricStorePipe
{
    public function __construct(public NecklaceMetricRepository $repository)
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
