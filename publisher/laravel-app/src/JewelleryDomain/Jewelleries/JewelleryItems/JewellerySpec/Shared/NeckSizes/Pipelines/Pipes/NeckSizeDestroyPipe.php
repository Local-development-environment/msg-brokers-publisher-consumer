<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Pipelines\Pipes;

use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Repositories\NeckSizeRepository;

final class NeckSizeDestroyPipe
{
    public function __construct(public NeckSizeRepository $repository)
    {
    }

    public function handle(int $id, \Closure $next): mixed
    {
        $this->repository->destroy($id);

        return $next($id);
    }
}
