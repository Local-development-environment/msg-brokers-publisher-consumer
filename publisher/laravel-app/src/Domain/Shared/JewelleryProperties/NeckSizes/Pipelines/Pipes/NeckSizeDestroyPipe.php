<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\NeckSizes\Pipelines\Pipes;

use Domain\Shared\JewelleryProperties\NeckSizes\Repositories\NeckSizeRepository;

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