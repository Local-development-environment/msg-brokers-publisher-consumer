<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\Beads\Pipelines;

use Domain\JewelleryProperties\Beads\Beads\Models\Bead;
use Domain\JewelleryProperties\Beads\Beads\Pipelines\Pipes\BeadBeadMetricsStoreRelationshipPipe;
use Domain\JewelleryProperties\Beads\Beads\Pipelines\Pipes\BeadDestroyPipe;
use Domain\JewelleryProperties\Beads\Beads\Pipelines\Pipes\BeadStorePipe;
use Domain\JewelleryProperties\Beads\Beads\Pipelines\Pipes\BeadUpdatePipe;
use Domain\Shared\AbstractPipeline;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
