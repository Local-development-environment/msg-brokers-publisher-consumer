<?php
declare(strict_types=1);

namespace Domain\Medias\CatalogMedias\CatalogVideos\Models;

use Domain\Medias\CatalogMedias\CatalogMedias\Models\CatalogMedia;
use Domain\Medias\CatalogMedias\CatalogVideoDetails\Models\CatalogVideoDetail;
use Domain\Medias\CatalogMedias\CatalogVideos\Enums\CatalogVideoEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class CatalogVideo extends Model
{
    protected $table = CatalogVideoEnum::TABLE_NAME->value;

    protected $fillable = ['alt_name','is_active'];

    public const string TYPE_RESOURCE = CatalogVideoEnum::TYPE_RESOURCE->value;

    public function catalogMedia(): BelongsTo
    {
        return $this->belongsTo(CatalogMedia::class, 'id');
    }

    public function catalogVideoDetails(): HasMany
    {
        return $this->hasMany(CatalogVideoDetail::class);
    }
}
