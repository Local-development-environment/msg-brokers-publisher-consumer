<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadBases\Pipelines\Pipes;

use Domain\JewelleryProperties\Beads\BeadBases\Repositories\BeadBaseRepository;

final class BeadBaseStorePipe
{
    public function __construct(public BeadBaseRepository $repository)
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