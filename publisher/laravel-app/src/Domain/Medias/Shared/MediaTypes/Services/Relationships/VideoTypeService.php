<?php

declare(strict_types=1);

namespace Domain\Medias\Shared\MediaTypes\Services\Relationships;

use Domain\Medias\Shared\MediaTypes\Repositories\VideoTypeRepository;
use Domain\Medias\Shared\VideoTypes\Models\VideoType;
use Domain\Medias\Shared\VideoTypes\Pipelines\VideoTypePipeline;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class VideoTypeService
{
    public function __construct(
        public VideoTypeRepository $repository,
        public VideoTypePipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): VideoType
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): VideoType
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