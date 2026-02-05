<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\Shared\MediaTypes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogMedias\Models\CatalogMedia;
use JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewMedias\Models\ReviewMedia;
use JewelleryDomain\Jewelleries\Medias\Shared\MediaTypes\Enums\MediaTypeEnum;

final class MediaType extends Model
{
    protected $table = MediaTypeEnum::TABLE_NAME->value;

    protected $fillable = ['name','slug','is_active'];

    public const string TYPE_RESOURCE = MediaTypeEnum::TYPE_RESOURCE->value;

    public function mediaCatalogs(): HasMany
    {
        return $this->hasMany(CatalogMedia::class);
    }

    public function mediaReviews(): HasMany
    {
        return $this->hasMany(ReviewMedia::class);
    }
}
