<?php

declare(strict_types=1);

namespace Domain\Medias\MediaVideos\Videos\Services;

use Domain\Medias\MediaVideos\Videos\Models\Video;
use Domain\Medias\MediaVideos\Videos\Pipelines\VideoPipeline;
use Domain\Medias\MediaVideos\Videos\Repositories\VideoRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class VideoService
{
    public function __construct(
        public VideoRepository $repository,
        public VideoPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): Video
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): Video
    {
        return $this->repository->show($data, $id);
    }

    /**
     * @throws Throwable
     */
    public function update(array $data, int $id): void
    {
        $this->pipeline->update($data, $id);
    }

    /**
     * @throws Throwable
     */
    public function destroy(int $id): void
    {
        $this->pipeline->destroy($id);
    }
}