<?php
declare(strict_types=1);

namespace Domain\Medias\Shared\MediaTypes\Models;

use Domain\Medias\CatalogMedias\CatalogMedias\Models\CatalogMedia;
use Domain\Medias\ReviewMedias\ReviewMedias\Models\ReviewMedia;
use Domain\Medias\Shared\MediaTypes\Enums\MediaTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
