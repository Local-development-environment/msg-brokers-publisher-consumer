<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\ImitationStones\Services;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\Inserts\ImitationStones\Models\ImitationStone;
use JewelleryDomain\Jewelleries\Inserts\ImitationStones\Repositories\ImitationStoneRepository;
use Throwable;

final class ImitationStoneService
{
    public function __construct(
        public ImitationStoneRepository $repository,
//        public ImitationStonePipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): ImitationStone
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): ImitationStone
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
