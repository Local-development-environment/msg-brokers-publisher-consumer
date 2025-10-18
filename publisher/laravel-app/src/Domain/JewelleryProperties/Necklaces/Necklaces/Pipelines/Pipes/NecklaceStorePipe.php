<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Necklaces\Necklaces\Pipelines\Pipes;

use Domain\JewelleryProperties\Necklaces\Necklaces\Repositories\NecklaceRepository;

final class NecklaceStorePipe
{
    public function __construct(public NecklaceRepository $repository)
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