<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadSizes\Pipelines\Pipes;

use Domain\JewelleryProperties\Beads\BeadSizes\Repositories\BeadSizeRepository;

final class BeadSizeStorePipe
{
    public function __construct(public BeadSizeRepository $repository)
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