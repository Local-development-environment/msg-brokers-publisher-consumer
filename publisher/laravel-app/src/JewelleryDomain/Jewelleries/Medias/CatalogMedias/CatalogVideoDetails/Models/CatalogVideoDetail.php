<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogVideoDetails\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogVideoDetails\Enums\CatalogVideoDetailEnum;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogVideos\Models\CatalogVideo;
use JewelleryDomain\Jewelleries\Medias\Shared\VideoTypes\Models\VideoType;

final class CatalogVideoDetail extends Model
{
    protected $table = CatalogVideoDetailEnum::TABLE_NAME->value;

    protected $fillable = ['video_type_id','catalog_video_id','src'];

    public const string TYPE_RESOURCE = CatalogVideoDetailEnum::TYPE_RESOURCE->value;

    public function videoType(): BelongsTo
    {
        return $this->belongsTo(VideoType::class);
    }

    public function catalogVideo(): BelongsTo
    {
        return $this->belongsTo(CatalogVideo::class);
    }
}
