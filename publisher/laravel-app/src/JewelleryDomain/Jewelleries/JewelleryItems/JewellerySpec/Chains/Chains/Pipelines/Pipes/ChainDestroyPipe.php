<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Pipelines\Pipes;

use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Repositories\ChainRepository;

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
