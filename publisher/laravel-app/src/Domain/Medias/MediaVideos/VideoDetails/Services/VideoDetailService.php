<?php

declare(strict_types=1);

namespace Domain\Medias\MediaVideos\VideoDetails\Services;

use Domain\Medias\MediaVideos\VideoDetails\Models\VideoDetail;
use Domain\Medias\MediaVideos\VideoDetails\Pipelines\VideoDetailPipeline;
use Domain\Medias\MediaVideos\VideoDetails\Repositories\VideoDetailRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class VideoDetailService
{
    public function __construct(
        public VideoDetailRepository $repository,
        public VideoDetailPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): VideoDetail
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): VideoDetail
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