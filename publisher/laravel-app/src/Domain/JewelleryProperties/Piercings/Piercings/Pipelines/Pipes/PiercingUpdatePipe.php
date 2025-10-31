<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Piercings\Piercings\Pipelines\Pipes;

use Domain\JewelleryProperties\Piercings\Piercings\Repositories\PiercingRepository;

final class PiercingUpdatePipe
{
    public function __construct(public PiercingRepository $repository)
    {
    }

    public function handle(array $data, \Closure $next): mixed
    {
        $this->repository->update(data_get($data, 'data.attributes'), data_get($data, 'id'));

        return $next($data);
    }
}