<?php

declare(strict_types=1);

namespace Domain\Medias\MediaVideos\Videos\Pipelines\Pipes;

use Domain\Medias\MediaVideos\Videos\Repositories\VideoRepository;

final class VideoDestroyPipe
{
    public function __construct(public VideoRepository $repository)
    {
    }

    public function handle(int $id, \Closure $next): mixed
    {
        $this->repository->destroy($id);

        return $next($id);
    }
}