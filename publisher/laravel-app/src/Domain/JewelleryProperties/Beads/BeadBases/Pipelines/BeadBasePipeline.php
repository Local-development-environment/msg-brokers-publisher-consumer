<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadBases\Pipelines;

use Domain\JewelleryProperties\Beads\BeadBases\Models\BeadBase;
use Domain\JewelleryProperties\Beads\BeadBases\Pipelines\Pipes\BeadBaseDestroyPipe;
use Domain\JewelleryProperties\Beads\BeadBases\Pipelines\Pipes\BeadBaseStorePipe;
use Domain\JewelleryProperties\Beads\BeadBases\Pipelines\Pipes\BeadBaseUpdatePipe;
use Domain\Shared\AbstractPipeline;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

final class BeadBasePipeline extends AbstractPipeline
{
    /**
     * @throws Throwable
     */
    public function store(array $data): BeadBase
    {
        try {
            DB::beginTransaction();

            $data = $this->pipeline
                ->send($data)
                ->through([
                    BeadBaseStorePipe::class
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
     * @throws Throwable
     */
    public function update(array $data, int $id): void
    {
        try {
            DB::beginTransaction();

            $this->pipeline
                ->send(data_set($data, 'id', $id))
                ->through([
                    BeadBaseUpdatePipe::class
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
     * @throws Throwable
     */
    public function destroy(int $id): void
    {
        try {
            DB::beginTransaction();

            $this->pipeline
                ->send($id)
                ->through([
                    BeadBaseDestroyPipe::class
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