<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\Necklaces\Pipelines\Pipes;

use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\Necklaces\Repositories\NecklaceRepository;

final class NecklaceDestroyPipe
{
    public function __construct(public NecklaceRepository $repository)
    {
    }

    public function handle(int $id, \Closure $next): mixed
    {
        $this->repository->destroy($id);

        return $next($id);
    }
}
