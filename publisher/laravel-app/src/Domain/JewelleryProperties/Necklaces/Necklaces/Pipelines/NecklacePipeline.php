<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Necklaces\Necklaces\Pipelines;

use Domain\JewelleryProperties\Necklaces\Necklaces\Pipelines\Pipes\NecklaceDestroyPipe;
use Domain\JewelleryProperties\Necklaces\Necklaces\Pipelines\Pipes\NecklaceNecklaceMetricsStoreRelationshipPipe;
use Domain\JewelleryProperties\Necklaces\Necklaces\Pipelines\Pipes\NecklaceStorePipe;
use Domain\JewelleryProperties\Necklaces\Necklaces\Pipelines\Pipes\NecklaceUpdatePipe;
use Domain\Shared\AbstractPipeline;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

final class NecklacePipeline extends AbstractPipeline
{
    /**
     * @inheritDoc
     * @throws Throwable
     */
    public function store(array $data): Model
    {
        try {
            DB::beginTransaction();

            $data = $this->pipeline
                ->send($data)
                ->through([
                    NecklaceStorePipe::class,
                    NecklaceNecklaceMetricsStoreRelationshipPipe::class,
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
                    NecklaceUpdatePipe::class
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
                    NecklaceDestroyPipe::class
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