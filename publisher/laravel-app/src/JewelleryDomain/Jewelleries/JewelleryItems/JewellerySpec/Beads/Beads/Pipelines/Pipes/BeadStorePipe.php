<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Pipelines\Pipes;

use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Repositories\BeadRepository;

final class BeadStorePipe
{
    public function __construct(public BeadRepository $repository)
    {
    }

    public function handle(array $data, \Closure $next): mixed
    {
        data_set($data, 'data.attributes.id', data_get($data, 'data.id'));

        $model = $this->repository->store(data_get($data, 'data.attributes'));

        data_set($data, 'model', $model);
        data_set($data, 'id', $model->id);

        return $next($data);
    }
}
