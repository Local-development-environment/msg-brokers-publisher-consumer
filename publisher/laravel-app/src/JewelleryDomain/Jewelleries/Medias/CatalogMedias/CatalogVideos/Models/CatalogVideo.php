<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogVideos\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogMedias\Models\CatalogMedia;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogVideoDetails\Models\CatalogVideoDetail;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogVideos\Enums\CatalogVideoEnum;

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
