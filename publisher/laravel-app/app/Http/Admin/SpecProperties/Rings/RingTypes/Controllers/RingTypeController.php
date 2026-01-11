<?php

declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Rings\RingTypes\Controllers;

use App\Http\Admin\SpecProperties\Rings\RingTypes\Requests\RingTypeStoreRequest;
use App\Http\Admin\SpecProperties\Rings\RingTypes\Requests\RingTypeUpdateRequest;
use App\Http\Admin\SpecProperties\Rings\RingTypes\Resources\RingTypeCollection;
use App\Http\Admin\SpecProperties\Rings\RingTypes\Resources\RingTypeResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Rings\RingTypes\Enums\RingTypeNameRoutesEnum;
use Domain\JewelleryProperties\Rings\RingTypes\Services\RingTypeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

final class RingTypeController extends Controller
{
    public function __construct(public RingTypeService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new RingTypeCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     * @throws Throwable
     */
    public function store(RingTypeStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new RingTypeResource($model))
            ->response()
            ->header('Location', route(RingTypeNameRoutesEnum::CRUD_SHOW->value, [
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

        return (new RingTypeResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws Throwable
     */
    public function update(RingTypeUpdateRequest $request, int $id): JsonResponse
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
