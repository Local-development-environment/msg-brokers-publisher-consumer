<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\Clasps\Pipelines\Pipes;

use Domain\Shared\JewelleryProperties\Clasps\Repositories\ClaspRepository;

final class ClaspDestroyPipe
{
    public function __construct(public ClaspRepository $repository)
    {
    }

    public function handle(int $id, \Closure $next): mixed
    {
        $this->repository->destroy($id);

        return $next($id);
    }
}