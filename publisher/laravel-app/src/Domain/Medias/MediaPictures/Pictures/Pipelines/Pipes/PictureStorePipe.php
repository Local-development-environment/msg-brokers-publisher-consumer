<?php

declare(strict_types=1);

namespace Domain\Medias\MediaPictures\Pictures\Pipelines\Pipes;

use Domain\Medias\MediaPictures\Pictures\Repositories\PictureRepository;

final class PictureStorePipe
{
    public function __construct(public PictureRepository $repository)
    {
    }

    public function handle(array $data, \Closure $next): mixed
    {
        data_set($data, 'data.attributes.id', data_get($data, 'data.id'));

        $model = $this->repository->store(data_get($data, 'data.attributes'));

        data_set($data, 'model', $model);
        data_set($data, 'id', $model->id);

        return $next($data);
    }
}