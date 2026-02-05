<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Pipelines;

use Domain\Shared\AbstractPipeline;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Models\Bead;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Pipelines\Pipes\BeadBeadMetricsStoreRelationshipPipe;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Pipelines\Pipes\BeadDestroyPipe;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Pipelines\Pipes\BeadStorePipe;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Pipelines\Pipes\BeadUpdatePipe;
use Throwable;

final class BeadPipeline extends AbstractPipeline
{
    /**
     * @inheritDoc
     * @throws Throwable
     */
    public function store(array $data): Model|Bead
    {
        try {
            DB::beginTransaction();

            $data = $this->pipeline
                ->send($data)
                ->through([
                    BeadStorePipe::class,
                    BeadBeadMetricsStoreRelationshipPipe::class
                ])
                ->thenReturn();

            DB::commit();

            return data_get($data, 'model');
        } catch (Exception|Throwable $e) {
            DB::rollBack();
            Log::error($e);

            throw ($e);
        }
    }

    /**
     * @inheritDoc
     * @throws Throwable
     */
    public function update(array $data, int $id): void
    {
        try {
            DB::beginTransaction();

            $this->pipeline
                ->send(data_set($data, 'id', $id))
                ->through([
                    BeadUpdatePipe::class
                ])
                ->thenReturn();

            DB::commit();
        } catch (Exception|\Throwable $e) {
            DB::rollBack();
            Log::error($e);

            throw ($e);
        }
    }

    /**
     * @inheritDoc
     * @throws Throwable
     */
    public function destroy(int $id): void
    {
        try {
            DB::beginTransaction();

            $this->pipeline
                ->send($id)
                ->through([
                    BeadDestroyPipe::class
                ])
                ->thenReturn();

            DB::commit();
        } catch (Exception|Throwable $e) {
            DB::rollBack();
            Log::error($e);

            throw ($e);
        }
    }
}
