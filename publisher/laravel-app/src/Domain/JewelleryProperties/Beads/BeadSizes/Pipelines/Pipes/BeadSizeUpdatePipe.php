<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadSizes\Pipelines\Pipes;

use Domain\JewelleryProperties\Beads\BeadSizes\Repositories\BeadSizeRepository;

final class BeadSizeUpdatePipe
{
    public function __construct(public BeadSizeRepository $repository)
    {
    }

    public function handle(array $data, \Closure $next): mixed
    {
        $this->repository->update(data_get($data, 'data.attributes'), data_get($data, 'id'));

        return $next($data);
    }
}