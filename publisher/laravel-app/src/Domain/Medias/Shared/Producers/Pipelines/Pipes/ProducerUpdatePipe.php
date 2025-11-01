<?php

declare(strict_types=1);

namespace Domain\Medias\Shared\Producers\Pipelines\Pipes;

use Domain\Medias\Shared\Producers\Repositories\ProducerRepository;

final class ProducerUpdatePipe
{
    public function __construct(public ProducerRepository $repository)
    {
    }

    public function handle(array $data, \Closure $next): mixed
    {
        $this->repository->update(data_get($data, 'data.attributes'), data_get($data, 'id'));

        return $next($data);
    }
}