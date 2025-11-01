<?php

declare(strict_types=1);

namespace Domain\Medias\MediaVideos\Videos\Pipelines\Pipes;

use Domain\Medias\MediaVideos\Videos\Repositories\VideoRepository;

final class VideoUpdatePipe
{
    public function __construct(public VideoRepository $repository)
    {
    }

    public function handle(array $data, \Closure $next): mixed
    {
        $this->repository->update(data_get($data, 'data.attributes'), data_get($data, 'id'));

        return $next($data);
    }
}