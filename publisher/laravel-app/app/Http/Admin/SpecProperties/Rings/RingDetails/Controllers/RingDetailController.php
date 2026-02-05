<?php

declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Rings\RingDetails\Controllers;

use App\Http\Admin\SpecProperties\Rings\RingDetails\Requests\RingDetailStoreRequest;
use App\Http\Admin\SpecProperties\Rings\RingDetails\Requests\RingDetailUpdateRequest;
use App\Http\Admin\SpecProperties\Rings\RingDetails\Resources\RingDetailCollection;
use App\Http\Admin\SpecProperties\Rings\RingDetails\Resources\RingDetailResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingDetails\Enums\RingDetailNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingDetails\Services\RingDetailService;
use Throwable;

final class RingDetailController extends Controller
{
    public function __construct(public RingDetailService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new RingDetailCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     * @throws Throwable
     */
    public function store(RingDetailStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new RingDetailResource($model))
            ->response()
            ->header('Location', route(RingDetailNameRoutesEnum::CRUD_SHOW->value, [
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

        return (new RingDetailResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws Throwable
     */
    public function update(RingDetailUpdateRequest $request, int $id): JsonResponse
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
