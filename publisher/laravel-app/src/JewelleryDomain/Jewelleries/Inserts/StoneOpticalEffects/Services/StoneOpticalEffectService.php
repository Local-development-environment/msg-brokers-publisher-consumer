<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneOpticalEffects\Services;

use Domain\Inserts\OpticalEffectStones\Models\StoneOpticalEffect;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use JewelleryDomain\Jewelleries\Inserts\StoneOpticalEffects\Pipelines\StoneOpticalEffectPipeline;
use JewelleryDomain\Jewelleries\Inserts\StoneOpticalEffects\Repositories\StoneOpticalEffectRepository;
use Throwable;

final class StoneOpticalEffectService
{
    public function __construct(
        public StoneOpticalEffectRepository $repository,
        public StoneOpticalEffectPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): StoneOpticalEffect
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): StoneOpticalEffect|Model
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
