<?php

declare(strict_types=1);

namespace Domain\Medias\MediaVideos\VideoDetails\Pipelines\Pipes;

use Domain\Medias\MediaVideos\VideoDetails\Repositories\VideoDetailRepository;

final class VideoDetailUpdatePipe
{
    public function __construct(public VideoDetailRepository $repository)
    {
    }

    public function handle(array $data, \Closure $next): mixed
    {
        $this->repository->update(data_get($data, 'data.attributes'), data_get($data, 'id'));

        return $next($data);
    }
}