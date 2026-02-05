<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\Brooches\Pipelines;

use Domain\Shared\AbstractPipeline;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\Brooches\Models\Brooch;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\Brooches\Pipelines\Pipes\BroochDestroyPipe;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\Brooches\Pipelines\Pipes\BroochStorePipe;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\Brooches\Pipelines\Pipes\BroochUpdatePipe;
use Throwable;

final class BroochPipeline extends AbstractPipeline
{
    /**
     * @inheritDoc
     * @throws Throwable
     */
    public function store(array $data): Brooch
    {
        try {
            DB::beginTransaction();

            $data = $this->pipeline
                ->send($data)
                ->through([
                    BroochStorePipe::class
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
                    BroochUpdatePipe::class
                ])
                ->thenReturn();

            DB::commit();
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
    public function destroy(int $id): void
    {
        try {
            DB::beginTransaction();

            $this->pipeline
                ->send($id)
                ->through([
                    BroochDestroyPipe::class
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
