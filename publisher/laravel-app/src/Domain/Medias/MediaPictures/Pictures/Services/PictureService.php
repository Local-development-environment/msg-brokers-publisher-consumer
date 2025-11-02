<?php

declare(strict_types=1);

namespace Domain\Medias\MediaPictures\Pictures\Services;

use Domain\Medias\MediaPictures\Pictures\Models\Picture;
use Domain\Medias\MediaPictures\Pictures\Pipelines\PicturePipeline;
use Domain\Medias\MediaPictures\Pictures\Repositories\PictureRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class PictureService
{
    public function __construct(
        public PictureRepository $repository,
        public PicturePipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): Picture
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): Picture
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