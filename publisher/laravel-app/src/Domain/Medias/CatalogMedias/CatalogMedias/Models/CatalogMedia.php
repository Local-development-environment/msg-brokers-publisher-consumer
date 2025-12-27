<?php
declare(strict_types=1);

namespace Domain\Medias\CatalogMedias\CatalogMedias\Models;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\Medias\CatalogMedias\CatalogMedias\Enums\CatalogMediaEnum;
use Domain\Medias\CatalogMedias\CatalogPictures\Models\CatalogPicture;
use Domain\Medias\CatalogMedias\CatalogVideos\Models\CatalogVideo;
use Domain\Medias\Shared\MediaTypes\Models\MediaType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

final class CatalogMedia extends Model
{
    protected $table = CatalogMediaEnum::TABLE_NAME->value;

    protected $fillable = ['jewellery_id','media_type_id','name','slug','is_active'];

    public const string TYPE_RESOURCE = CatalogMediaEnum::TYPE_RESOURCE->value;

    public function jewellery(): BelongsTo
    {
        return $this->belongsTo(Jewellery::class);
    }

    public function mediaType(): BelongsTo
    {
        return $this->belongsTo(MediaType::class);
    }

    public function catalogPicture(): HasOne
    {
        return $this->hasOne(CatalogPicture::class, 'id');
    }

    public function catalogVideo(): HasOne
    {
        return $this->hasOne(CatalogVideo::class, 'id');
    }
}
