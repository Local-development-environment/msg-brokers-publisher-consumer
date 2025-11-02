<?php

declare(strict_types=1);

namespace Domain\Medias\MediaVideos\Videos\Pipelines\Pipes;

use Domain\Medias\MediaVideos\Videos\Repositories\VideoRepository;

final class VideoStorePipe
{
    public function __construct(public VideoRepository $repository)
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