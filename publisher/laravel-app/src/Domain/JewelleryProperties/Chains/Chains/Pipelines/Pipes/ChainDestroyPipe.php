<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Chains\Chains\Pipelines\Pipes;

use Domain\JewelleryProperties\Chains\Chains\Repositories\ChainRepository;

final class ChainDestroyPipe
{
    public function __construct(public ChainRepository $repository)
    {
    }

    public function handle(int $id, \Closure $next): mixed
    {
        $this->repository->destroy($id);

        return $next($id);
    }
}