<?php

declare(strict_types=1);

namespace Domain\Medias\Shared\MediaTypes\Services;

use Domain\Medias\Shared\MediaTypes\Models\MediaType;
use Domain\Medias\Shared\MediaTypes\Pipelines\MediaTypePipeline;
use Domain\Medias\Shared\MediaTypes\Repositories\MediaTypeRepository;
use Domain\Medias\Shared\VideoTypes\Models\VideoType;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class MediaTypeService
{
    public function __construct(
        public MediaTypeRepository $repository,
        public MediaTypePipeline   $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): MediaType
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): MediaType
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