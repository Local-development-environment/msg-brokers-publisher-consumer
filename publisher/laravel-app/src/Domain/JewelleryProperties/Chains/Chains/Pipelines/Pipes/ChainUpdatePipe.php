<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Chains\Chains\Pipelines\Pipes;

use Domain\JewelleryProperties\Chains\Chains\Repositories\ChainRepository;

final class ChainUpdatePipe
{
    public function __construct(public ChainRepository $repository)
    {
    }

    public function handle(array $data, \Closure $next): mixed
    {
        $this->repository->update(data_get($data, 'data.attributes'), data_get($data, 'id'));

        return $next($data);
    }
}