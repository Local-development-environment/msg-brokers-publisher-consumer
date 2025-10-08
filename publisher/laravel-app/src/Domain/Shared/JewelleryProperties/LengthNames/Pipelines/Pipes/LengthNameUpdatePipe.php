<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\LengthNames\Pipelines\Pipes;

use Domain\Shared\JewelleryProperties\LengthNames\Repositories\LengthNameRepository;

final class LengthNameUpdatePipe
{
    public function __construct(public LengthNameRepository $repository)
    {
    }

    public function handle(array $data, \Closure $next): mixed
    {
        $this->repository->update(data_get($data, 'data.attributes'), data_get($data, 'id'));

        return $next($data);
    }
}