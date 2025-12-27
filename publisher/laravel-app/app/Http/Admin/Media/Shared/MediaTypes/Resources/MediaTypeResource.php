<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\Shared\MediaTypes\Resources;

use App\Http\Admin\Media\CatalogMedias\CatalogMedias\Resources\CatalogMediaCollection;
use App\Http\Admin\Media\ReviewMedias\ReviewMedias\Resources\MediaReviewCollection;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Medias\Shared\MediaTypes\Enums\MediaTypeNameRoutesEnum;
use Domain\Medias\Shared\MediaTypes\Enums\MediaTypeRelationshipsEnum;
use Domain\Medias\Shared\MediaTypes\Models\MediaType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin MediaType */
final class MediaTypeResource extends JsonResource
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
            'type' => MediaType::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                'mediaCatalog' => $this->sectionRelationships(
                    MediaTypeNameRoutesEnum::RELATED_TO_MEDIA_CATALOGS->value,
                    CatalogMediaCollection::class
                ),
                'mediaReview' => $this->sectionRelationships(
                    MediaTypeNameRoutesEnum::RELATED_TO_MEDIA_REVIEWS->value,
                    MediaReviewCollection::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            MediaReviewCollection::class  => $this->whenLoaded(MediaTypeRelationshipsEnum::MEDIA_REVIEWS->value),
            CatalogMediaCollection::class => $this->whenLoaded(MediaTypeRelationshipsEnum::MEDIA_CATALOGS->value),
        ];
    }
}
