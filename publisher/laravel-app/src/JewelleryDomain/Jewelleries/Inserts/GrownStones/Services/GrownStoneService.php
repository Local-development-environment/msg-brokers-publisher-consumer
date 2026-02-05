<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\GrownStones\Services;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\Inserts\GrownStones\Models\GrownStone;
use JewelleryDomain\Jewelleries\Inserts\GrownStones\Repositories\GrownStoneRepository;
use Throwable;

final class GrownStoneService
{
    public function __construct(
        public GrownStoneRepository $repository,
//        public GrownStonePipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): GrownStone
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): GrownStone
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
