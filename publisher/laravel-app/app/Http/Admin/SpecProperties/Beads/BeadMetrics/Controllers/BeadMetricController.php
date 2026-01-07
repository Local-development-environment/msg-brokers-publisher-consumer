<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Beads\BeadMetrics\Controllers;

use App\Http\Admin\SpecProperties\Beads\BeadMetrics\Requests\BeadMetricStoreRequest;
use App\Http\Admin\SpecProperties\Beads\BeadMetrics\Requests\BeadMetricUpdateRequest;
use App\Http\Admin\SpecProperties\Beads\BeadMetrics\Resources\BeadMetricCollection;
use App\Http\Admin\SpecProperties\Beads\BeadMetrics\Resources\BeadMetricResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Beads\BeadMetrics\Enums\BeadMetricNameRoutesEnum;
use Domain\JewelleryProperties\Beads\BeadMetrics\Services\BeadMetricService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class BeadMetricController extends Controller
{
    public function __construct(public BeadMetricService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new BeadMetricCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     * @throws \Throwable
     */
    public function store(BeadMetricStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new BeadMetricResource($model))
            ->response()
            ->header('Location', route(BeadMetricNameRoutesEnum::CRUD_SHOW->value, [
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

        return (new BeadMetricResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws \Throwable
     */
    public function update(BeadMetricUpdateRequest $request, int $id): JsonResponse
    {
        $data = $request->all();

        $this->service->update($data, $id);

        return response()->json(null, 204);
    }

    /**
     * Remove the specified resource from storage.
     * @throws \Throwable
     */
    public function destroy(int $id): JsonResponse
    {
        $this->service->destroy($id);

        return response()->json(null, 204);
    }
}
