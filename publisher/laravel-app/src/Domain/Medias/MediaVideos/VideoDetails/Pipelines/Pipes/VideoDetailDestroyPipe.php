<?php

declare(strict_types=1);

namespace Domain\Medias\MediaVideos\VideoDetails\Pipelines\Pipes;

use Domain\Medias\MediaVideos\VideoDetails\Repositories\VideoDetailRepository;

final class VideoDetailDestroyPipe
{
    public function __construct(public VideoDetailRepository $repository)
    {
    }

    public function handle(int $id, \Closure $next): mixed
    {
        $this->repository->destroy($id);

        return $next($id);
    }
}