<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Pipelines\Pipes;

use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Repositories\BeadRepository;

final class BeadDestroyPipe
{
    public function __construct(public BeadRepository $repository)
    {
    }

    public function handle(int $id, \Closure $next): mixed
    {
        $this->repository->destroy($id);

        return $next($id);
    }
}
