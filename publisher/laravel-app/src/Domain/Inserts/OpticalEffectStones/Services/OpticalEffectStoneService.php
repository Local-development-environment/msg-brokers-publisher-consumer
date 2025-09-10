<?php

declare(strict_types=1);

namespace Domain\Inserts\OpticalEffectStones\Services;

use Domain\Inserts\OpticalEffectStones\Models\OpticalEffectStone;
use Domain\Inserts\OpticalEffectStones\Repositories\OpticalEffectStoneRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class OpticalEffectStoneService
{
    public function __construct(
        public OpticalEffectStoneRepository $repository,
//        public StoneTypeOriginPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): OpticalEffectStone
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): OpticalEffectStone
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