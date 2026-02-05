<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneFamilies\Services;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\Inserts\StoneFamilies\Models\StoneFamily;
use JewelleryDomain\Jewelleries\Inserts\StoneFamilies\Repositories\StoneFamilyRepository;
use Throwable;

final class StoneFamilyService
{
    public function __construct(
        public StoneFamilyRepository $repository,
//        public StoneTypeOriginPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): StoneFamily
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): StoneFamily
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
