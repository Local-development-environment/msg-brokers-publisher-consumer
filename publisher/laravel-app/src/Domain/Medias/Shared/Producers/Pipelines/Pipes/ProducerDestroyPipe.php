<?php

declare(strict_types=1);

namespace Domain\Medias\Shared\Producers\Pipelines\Pipes;

use Domain\Medias\Shared\Producers\Repositories\ProducerRepository;

final class ProducerDestroyPipe
{
    public function __construct(public ProducerRepository $repository)
    {
    }

    public function handle(int $id, \Closure $next): mixed
    {
        $this->repository->destroy($id);

        return $next($id);
    }
}