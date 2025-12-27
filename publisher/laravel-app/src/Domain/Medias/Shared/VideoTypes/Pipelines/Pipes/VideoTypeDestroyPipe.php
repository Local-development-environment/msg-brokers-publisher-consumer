<?php

declare(strict_types=1);

namespace Domain\Medias\Shared\VideoTypes\Pipelines\Pipes;

use Domain\Medias\Shared\MediaTypes\Repositories\MediaTypeRepository;
use Domain\Medias\Shared\VideoTypes\Repositories\VideoTypeRepository;

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