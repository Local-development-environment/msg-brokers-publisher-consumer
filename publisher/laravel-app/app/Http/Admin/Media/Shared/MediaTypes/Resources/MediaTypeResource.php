<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\Shared\MediaTypes\Resources;

use App\Http\Admin\Media\CatalogMedias\CatalogMedias\Resources\CatalogMediaResource;
use App\Http\Admin\Media\ReviewMedias\ReviewMedias\Resources\ReviewMediaResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JewelleryDomain\Jewelleries\Medias\Shared\MediaTypes\Enums\MediaTypeNameRoutesEnum;
use JewelleryDomain\Jewelleries\Medias\Shared\MediaTypes\Enums\MediaTypeRelationshipsEnum;
use JewelleryDomain\Jewelleries\Medias\Shared\MediaTypes\Models\MediaType;

/** @mixin MediaType */
final class MediaTypeResource extends JsonResource
{
    use JsonApiSpecificationResourceTrait;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => MediaType::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                MediaTypeRelationshipsEnum::CATALOG_MEDIAS->value => $this->sectionRelationships(
                    MediaTypeNameRoutesEnum::RELATED_TO_CATALOG_MEDIAS->value,
                    MediaTypeRelationshipsEnum::CATALOG_MEDIAS->value
                ),
                MediaTypeRelationshipsEnum::REVIEW_MEDIAS->value => $this->sectionRelationships(
                    MediaTypeNameRoutesEnum::RELATED_TO_REVIEW_MEDIAS->value,
                    MediaTypeRelationshipsEnum::REVIEW_MEDIAS->value
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            ReviewMediaResource::collection($this->whenLoaded(MediaTypeRelationshipsEnum::REVIEW_MEDIAS->value)),
            CatalogMediaResource::collection($this->whenLoaded(MediaTypeRelationshipsEnum::CATALOG_MEDIAS->value)),
        ];
    }
}
