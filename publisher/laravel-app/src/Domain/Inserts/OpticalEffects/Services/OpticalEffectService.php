<?php

declare(strict_types=1);

namespace Domain\Inserts\OpticalEffects\Services;

use Domain\Inserts\OpticalEffects\Models\OpticalEffect;
use Domain\Inserts\OpticalEffects\Repositories\OpticalEffectRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class OpticalEffectService
{
    public function __construct(
        public OpticalEffectRepository $repository,
//        public StoneTypeOriginPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): OpticalEffect
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): OpticalEffect
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