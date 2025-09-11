<?php

declare(strict_types=1);

namespace Domain\Inserts\OptionalInfos\Services;

use Domain\Inserts\OptionalInfos\Models\OptionalInfo;
use Domain\Inserts\OptionalInfos\Repositories\OptionalInfoRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class OptionalInfoService
{
    public function __construct(
        public OptionalInfoRepository $repository,
//        public StoneTypeOriginPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): OptionalInfo
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): OptionalInfo
    {
        return $this->repository->show($data, $id);
    }

    /**
     * @throws Throwable
     */
    public function update(array $data, int $id): void
    {
//        $this->pipeline->update($data, $id);
    }

    /**
     * @throws Throwable
     */
    public function destroy(int $id): void
    {
//        $this->pipeline->destroy($id);
    }
}