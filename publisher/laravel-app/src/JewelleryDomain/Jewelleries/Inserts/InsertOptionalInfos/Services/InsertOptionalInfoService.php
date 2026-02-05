<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\InsertOptionalInfos\Services;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\Inserts\InsertOptionalInfos\Models\InsertOptionalInfo;
use JewelleryDomain\Jewelleries\Inserts\InsertOptionalInfos\Repositories\InsertOptionalInfoRepository;
use Throwable;

final class InsertOptionalInfoService
{
    public function __construct(
        public InsertOptionalInfoRepository $repository,
//        public StoneTypeOriginPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): InsertOptionalInfo
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): InsertOptionalInfo
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
