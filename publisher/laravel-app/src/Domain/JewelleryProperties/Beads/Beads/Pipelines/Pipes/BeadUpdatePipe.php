<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\Beads\Pipelines\Pipes;

use Domain\JewelleryProperties\Beads\Beads\Repositories\BeadRepository;

final class BeadUpdatePipe
{
    public function __construct(public BeadRepository $repository)
    {
    }

    public function handle(array $data, \Closure $next): mixed
    {
        $this->repository->update(data_get($data, 'data.attributes'), data_get($data, 'id'));

        return $next($data);
    }
}