<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\CatalogMedias\CatalogMedias\Resources;

use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Admin\Media\CatalogMedias\CatalogPictures\Resources\CatalogPictureResource;
use App\Http\Admin\Media\CatalogMedias\CatalogVideos\Resources\CatalogVideoResource;
use App\Http\Admin\Media\Shared\MediaTypes\Resources\MediaTypeResource;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Medias\CatalogMedias\CatalogMedias\Enums\CatalogMediaNameRoutesEnum;
use Domain\Medias\CatalogMedias\CatalogMedias\Enums\CatalogMediaRelationshipsEnum;
use Domain\Medias\CatalogMedias\CatalogMedias\Models\CatalogMedia;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin CatalogMedia */
final class CatalogMediaResource extends JsonResource
{
    use IncludeRelatedEntitiesResourceTrait;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => CatalogMedia::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                'jewellery' => $this->sectionRelationships(
                    CatalogMediaNameRoutesEnum::RELATED_TO_JEWELLERY->value,
                    JewelleryResource::class
                ),
                'mediaType' => $this->sectionRelationships(
                    CatalogMediaNameRoutesEnum::RELATED_TO_MEDIA_TYPE->value,
                    MediaTypeResource::class
                ),
                'catalogVideo' => $this->sectionRelationships(
                    CatalogMediaNameRoutesEnum::RELATED_TO_MEDIA_TYPE->value,
                    CatalogVideoResource::class
                ),
                'catalogPicture' => $this->sectionRelationships(
                    CatalogMediaNameRoutesEnum::RELATED_TO_MEDIA_TYPE->value,
                    CatalogPictureResource::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            JewelleryResource::class => $this->whenLoaded(CatalogMediaRelationshipsEnum::JEWELLERY->value),
            MediaTypeResource::class => $this->whenLoaded(CatalogMediaRelationshipsEnum::MEDIA_TYPE->value),
            CatalogVideoResource::class => $this->whenLoaded(CatalogMediaRelationshipsEnum::CATALOG_VIDEO->value),
            CatalogPictureResource::class => $this->whenLoaded(CatalogMediaRelationshipsEnum::CATALOG_PICTURE->value),
        ];
    }
}
