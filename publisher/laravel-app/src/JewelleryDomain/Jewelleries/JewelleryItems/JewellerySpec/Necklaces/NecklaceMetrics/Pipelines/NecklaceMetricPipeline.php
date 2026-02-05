<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\NecklaceMetrics\Pipelines;

use Domain\Shared\AbstractPipeline;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\NecklaceMetrics\Pipelines\Pipelines\NecklaceMetricDestroyPipe;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\NecklaceMetrics\Pipelines\Pipelines\NecklaceMetricStorePipe;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\NecklaceMetrics\Pipelines\Pipelines\NecklaceMetricUpdatePipe;
use Throwable;

final class NecklaceMetricPipeline extends AbstractPipeline
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
                    NecklaceMetricStorePipe::class
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
                    NecklaceMetricUpdatePipe::class
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
                    NecklaceMetricDestroyPipe::class
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
