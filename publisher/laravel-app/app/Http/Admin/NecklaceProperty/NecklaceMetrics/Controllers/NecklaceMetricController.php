<?php

namespace App\Http\Admin\NecklaceProperty\NecklaceMetrics\Controllers;

use App\Http\Admin\NecklaceProperty\NecklaceMetrics\Requests\NecklaceMetricStoreRequest;
use App\Http\Admin\NecklaceProperty\NecklaceMetrics\Requests\NecklaceMetricUpdateRequest;
use App\Http\Admin\NecklaceProperty\NecklaceMetrics\Resources\NecklaceMetricCollection;
use App\Http\Admin\NecklaceProperty\NecklaceMetrics\Resources\NecklaceMetricResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Enums\NecklaceMetricNameRoutesEnum;
use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Services\NecklaceMetricService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class NecklaceMetricController extends Controller
{
    public function __construct(public NecklaceMetricService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new NecklaceMetricCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     * @throws Throwable
     */
    public function store(NecklaceMetricStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new NecklaceMetricResource($model))
            ->response()
            ->header('Location', route(NecklaceMetricNameRoutesEnum::CRUD_SHOW->value, [
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

        return (new NecklaceMetricResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws Throwable
     */
    public function update(NecklaceMetricUpdateRequest $request, int $id): JsonResponse
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
