<?php

declare(strict_types=1);

namespace Domain\Medias\MediaPictures\Pictures\Pipelines\Pipes;

use Domain\Medias\MediaPictures\Pictures\Repositories\PictureRepository;

final class PictureDestroyPipe
{
    public function __construct(public PictureRepository $repository)
    {
    }

    public function handle(int $id, \Closure $next): mixed
    {
        $this->repository->destroy($id);

        return $next($id);
    }
}