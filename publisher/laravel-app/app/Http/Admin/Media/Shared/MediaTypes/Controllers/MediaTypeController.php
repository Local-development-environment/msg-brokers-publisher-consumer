<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\Shared\MediaTypes\Controllers;

use App\Http\Admin\Media\Shared\MediaTypes\Requests\MediaTypeStoreRequest;
use App\Http\Admin\Media\Shared\MediaTypes\Requests\MediaTypeUpdateRequest;
use App\Http\Admin\Media\Shared\MediaTypes\Resources\MediaTypeCollection;
use App\Http\Admin\Media\Shared\MediaTypes\Resources\MediaTypeResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use JewelleryDomain\Jewelleries\Medias\Shared\MediaTypes\Enums\MediaTypeNameRoutesEnum;
use JewelleryDomain\Jewelleries\Medias\Shared\MediaTypes\Services\MediaTypeService;
use Throwable;

final class MediaTypeController extends Controller
{
    public function __construct(public MediaTypeService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new MediaTypeCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     * @throws Throwable
     */
    public function store(MediaTypeStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new MediaTypeResource($model))
            ->response()
            ->header('Location', route(MediaTypeNameRoutesEnum::CRUD_SHOW->value, [
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

        return (new MediaTypeResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws Throwable
     */
    public function update(MediaTypeUpdateRequest $request, int $id): JsonResponse
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
