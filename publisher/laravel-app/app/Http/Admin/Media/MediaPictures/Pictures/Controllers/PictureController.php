<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\MediaPictures\Pictures\Controllers;

use App\Http\Admin\Media\MediaPictures\Pictures\Requests\PictureStoreRequest;
use App\Http\Admin\Media\MediaPictures\Pictures\Requests\PictureUpdateRequest;
use App\Http\Admin\Media\MediaPictures\Pictures\Resources\PictureCollection;
use App\Http\Admin\Media\MediaPictures\Pictures\Resources\PictureResource;
use App\Http\Controllers\Controller;
use Domain\Medias\MediaPictures\Pictures\Enums\PictureNameRoutesEnum;
use Domain\Medias\MediaPictures\Pictures\Services\PictureService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

final class PictureController extends Controller
{
    public function __construct(public PictureService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new PictureCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     * @throws Throwable
     */
    public function store(PictureStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new PictureResource($model))
            ->response()
            ->header('Location', route(PictureNameRoutesEnum::CRUD_SHOW->value, [
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

        return (new PictureResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws Throwable
     */
    public function update(PictureUpdateRequest $request, int $id): JsonResponse
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
