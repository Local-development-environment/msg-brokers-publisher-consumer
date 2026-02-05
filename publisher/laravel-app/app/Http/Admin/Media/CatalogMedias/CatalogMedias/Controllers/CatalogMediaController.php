<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\CatalogMedias\CatalogMedias\Controllers;

use App\Http\Admin\Media\CatalogMedias\CatalogMedias\Requests\CatalogMediaStoreRequest;
use App\Http\Admin\Media\CatalogMedias\CatalogMedias\Requests\CatalogMediaUpdateRequest;
use App\Http\Admin\Media\CatalogMedias\CatalogMedias\Resources\CatalogMediaCollection;
use App\Http\Admin\Media\CatalogMedias\CatalogMedias\Resources\CatalogMediaResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogMedias\Enums\CatalogMediaNameRoutesEnum;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogMedias\Services\CatalogMediaService;
use Throwable;

final class CatalogMediaController extends Controller
{
    public function __construct(public CatalogMediaService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new CatalogMediaCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CatalogMediaStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new CatalogMediaResource($model))
            ->response()
            ->header('Location', route(CatalogMediaNameRoutesEnum::CRUD_SHOW->value, [
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

        return (new CatalogMediaResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws Throwable
     */
    public function update(CatalogMediaUpdateRequest $request, int $id): JsonResponse
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
