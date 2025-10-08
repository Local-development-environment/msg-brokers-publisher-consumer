<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\Clasps\Pipelines;

use Domain\Shared\AbstractPipeline;
use Domain\Shared\JewelleryProperties\Clasps\Models\Clasp;
use Domain\Shared\JewelleryProperties\Clasps\Pipelines\Pipes\ClaspDestroyPipe;
use Domain\Shared\JewelleryProperties\Clasps\Pipelines\Pipes\ClaspStorePipe;
use Domain\Shared\JewelleryProperties\Clasps\Pipelines\Pipes\ClaspUpdatePipe;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

final class ClaspPipeline extends AbstractPipeline
{
    /**
     * @throws Throwable
     */
    public function store(array $data): Clasp
    {
        try {
            DB::beginTransaction();

            $data = $this->pipeline
                ->send($data)
                ->through([
                    ClaspStorePipe::class
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
                    ClaspUpdatePipe::class
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
                    ClaspDestroyPipe::class
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