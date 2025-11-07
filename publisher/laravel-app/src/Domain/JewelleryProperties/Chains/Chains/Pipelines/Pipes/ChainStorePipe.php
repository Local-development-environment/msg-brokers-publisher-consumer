<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Chains\Chains\Pipelines\Pipes;

use Domain\JewelleryProperties\Chains\Chains\Repositories\ChainRepository;

final class ChainStorePipe
{
    public function __construct(public ChainRepository $repository)
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