<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Piercings\Piercings\Pipelines\Pipes;

use Domain\JewelleryProperties\Piercings\Piercings\Repositories\PiercingRepository;

final class PiercingDestroyPipe
{
    public function __construct(public PiercingRepository $repository)
    {
    }

    public function handle(int $id, \Closure $next): mixed
    {
        $this->repository->destroy($id);

        return $next($id);
    }
}