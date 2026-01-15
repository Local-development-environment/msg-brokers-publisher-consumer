<?php

declare(strict_types=1);

namespace Domain\Jewelleries\Jewelleries\Pipelines;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\Jewelleries\Jewelleries\Pipelines\Pipes\JewelleryStorePipe;
use Domain\Shared\AbstractPipeline;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

final class JewelleryPipeline extends AbstractPipeline
{
    /**
     * @inheritDoc
     * @throws Throwable
     */
    public function store(array $data): Model|Jewellery
    {
        try {
            DB::beginTransaction();

            $data = $this->pipeline
                ->send($data)
                ->through([
                    JewelleryStorePipe::class,
//                    BeadBeadMetricsStoreRelationshipPipe::class
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
     */
    public function update(array $data, int $id): void
    {
        // TODO: Implement update() method.
    }

    /**
     * @inheritDoc
     */
    public function destroy(int $id): void
    {
        // TODO: Implement destroy() method.
    }
}
