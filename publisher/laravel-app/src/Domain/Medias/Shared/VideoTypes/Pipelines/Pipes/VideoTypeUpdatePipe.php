<?php

declare(strict_types=1);

namespace Domain\Medias\Shared\VideoTypes\Pipelines\Pipes;

use Domain\Medias\Shared\MediaTypes\Repositories\VideoTypeRepository;

final class VideoTypeUpdatePipe
{
    public function __construct(public VideoTypeRepository $repository)
    {
    }

    public function handle(array $data, \Closure $next): mixed
    {
        $this->repository->update(data_get($data, 'data.attributes'), data_get($data, 'id'));

        return $next($data);
    }
}