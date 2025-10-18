<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\NeckSizes\Pipelines\Pipes;

use Domain\Shared\JewelleryProperties\NeckSizes\Repositories\NeckSizeRepository;

final class NeckSizeUpdatePipe
{
    public function __construct(public NeckSizeRepository $repository)
    {
    }

    public function handle(array $data, \Closure $next): mixed
    {
        $this->repository->update(data_get($data, 'data.attributes'), data_get($data, 'id'));

        return $next($data);
    }
}