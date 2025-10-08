<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\LengthNames\Pipelines\Pipes;

use Domain\Shared\JewelleryProperties\LengthNames\Repositories\LengthNameRepository;

final class LengthNameDestroyPipe
{
    public function __construct(public LengthNameRepository $repository)
    {
    }

    public function handle(int $id, \Closure $next): mixed
    {
        $this->repository->destroy($id);

        return $next($id);
    }
}