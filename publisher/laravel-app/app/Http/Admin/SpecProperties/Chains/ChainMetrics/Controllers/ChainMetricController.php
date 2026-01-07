<?php

declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Chains\ChainMetrics\Controllers;

use App\Http\Admin\SpecProperties\Chains\ChainMetrics\Requests\ChainMetricStoreRequest;
use App\Http\Admin\SpecProperties\Chains\ChainMetrics\Requests\ChainMetricUpdateRequest;
use App\Http\Admin\SpecProperties\Chains\ChainMetrics\Resources\ChainMetricCollection;
use App\Http\Admin\SpecProperties\Chains\ChainMetrics\Resources\ChainMetricResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Chains\ChainMetrics\Enums\ChainMetricNameRoutesEnum;
use Domain\JewelleryProperties\Chains\ChainMetrics\Services\ChainMetricService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

final class ChainMetricController extends Controller
{
    public function __construct(public ChainMetricService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new ChainMetricCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     * @throws Throwable
     */
    public function store(ChainMetricStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new ChainMetricResource($model))
            ->response()
            ->header('Location', route(ChainMetricNameRoutesEnum::CRUD_SHOW->value, [
                'id' => $model->id
            ]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, int $id): JsonResponse
    {
        $data = $request->all();
        data_set($data, 'id', $id);
        $model = $this->service->show($data, $id);

        return (new ChainMetricResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws Throwable
     */
    public function update(ChainMetricUpdateRequest $request, int $id): JsonResponse
    {
        $data = $request->all();

        $this->service->update($data, $id);

        return response()->json(null, 204);
    }

    /**
     * Remove the specified resource from storage.
     * @throws Throwable
     */
    public function destroy(int $id): JsonResponse
    {
        $this->service->destroy($id);

        return response()->json(null, 204);
    }
}
