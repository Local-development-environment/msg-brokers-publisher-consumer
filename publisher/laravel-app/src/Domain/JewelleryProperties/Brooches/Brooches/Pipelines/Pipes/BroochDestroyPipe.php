<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Brooches\Brooches\Pipelines\Pipes;

use Domain\JewelleryProperties\Brooches\Brooches\Repositories\BroochRepository;

final class BroochDestroyPipe
{
    public function __construct(public BroochRepository $repository)
    {
    }

    public function handle(int $id, \Closure $next): mixed
    {
        $this->repository->destroy($id);

        return $next($id);
    }
}