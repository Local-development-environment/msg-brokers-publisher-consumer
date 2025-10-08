<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadBases\Pipelines\Pipes;

use Domain\JewelleryProperties\Beads\BeadBases\Repositories\BeadBaseRepository;

final class BeadBaseUpdatePipe
{
    public function __construct(public BeadBaseRepository $repository)
    {
    }

    public function handle(array $data, \Closure $next): mixed
    {
        $this->repository->update(data_get($data, 'data.attributes'), data_get($data, 'id'));

        return $next($data);
    }
}