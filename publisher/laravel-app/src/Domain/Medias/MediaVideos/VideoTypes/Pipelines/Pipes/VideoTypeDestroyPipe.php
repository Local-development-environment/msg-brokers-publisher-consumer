<?php

declare(strict_types=1);

namespace Domain\Medias\MediaVideos\VideoTypes\Pipelines\Pipes;

use Domain\Medias\MediaVideos\VideoTypes\Repositories\VideoTypeRepository;

final class VideoTypeDestroyPipe
{
    public function __construct(public VideoTypeRepository $repository)
    {
    }

    public function handle(int $id, \Closure $next): mixed
    {
        $this->repository->destroy($id);

        return $next($id);
    }
}