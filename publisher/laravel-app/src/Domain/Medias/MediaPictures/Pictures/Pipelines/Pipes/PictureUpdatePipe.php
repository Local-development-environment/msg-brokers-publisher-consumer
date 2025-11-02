<?php

declare(strict_types=1);

namespace Domain\Medias\MediaPictures\Pictures\Pipelines\Pipes;

use Domain\Medias\MediaPictures\Pictures\Repositories\PictureRepository;

final class PictureUpdatePipe
{
    public function __construct(public PictureRepository $repository)
    {
    }

    public function handle(array $data, \Closure $next): mixed
    {
        $this->repository->update(data_get($data, 'data.attributes'), data_get($data, 'id'));

        return $next($data);
    }
}