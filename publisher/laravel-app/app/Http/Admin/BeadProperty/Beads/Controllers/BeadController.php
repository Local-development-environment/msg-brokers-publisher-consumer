<?php
declare(strict_types=1);

namespace App\Http\Admin\BeadProperty\Beads\Controllers;

use App\Http\Admin\BeadProperty\Beads\Requests\BeadStoreRequest;
use App\Http\Admin\BeadProperty\Beads\Requests\BeadUpdateRequest;
use App\Http\Admin\BeadProperty\Beads\Resources\BeadCollection;
use App\Http\Admin\BeadProperty\Beads\Resources\BeadResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Beads\Beads\Enums\BeadNameRoutesEnum;
use Domain\JewelleryProperties\Beads\Beads\Services\BeadService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class BeadController extends Controller
{
    public function __construct(public BeadService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new BeadCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     * @throws \Throwable
     */
    public function store(BeadStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new BeadResource($model))
            ->response()
            ->header('Location', route(BeadNameRoutesEnum::CRUD_SHOW->value, [
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

        return (new BeadResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws \Throwable
     */
    public function update(BeadUpdateRequest $request, int $id): JsonResponse
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
