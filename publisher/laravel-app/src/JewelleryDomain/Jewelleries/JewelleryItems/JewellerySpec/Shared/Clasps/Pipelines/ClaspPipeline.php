<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Clasps\Pipelines;

use Domain\Shared\AbstractPipeline;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Clasps\Models\Clasp;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Clasps\Pipelines\Pipes\ClaspDestroyPipe;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Clasps\Pipelines\Pipes\ClaspStorePipe;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Clasps\Pipelines\Pipes\ClaspUpdatePipe;
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
