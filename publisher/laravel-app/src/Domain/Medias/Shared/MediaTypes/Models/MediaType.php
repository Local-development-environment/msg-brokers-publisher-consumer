<?php
declare(strict_types=1);

namespace Domain\Medias\Shared\MediaTypes\Models;

use Domain\Medias\MediaCatalog\MediaCatalog\Models\MediaCatalog;
use Domain\Medias\MediaReviews\MediaReviews\Models\MediaReview;
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
        return $this->hasMany(MediaCatalog::class);
    }

    public function mediaReviews(): HasMany
    {
        return $this->hasMany(MediaReview::class);
    }
}
