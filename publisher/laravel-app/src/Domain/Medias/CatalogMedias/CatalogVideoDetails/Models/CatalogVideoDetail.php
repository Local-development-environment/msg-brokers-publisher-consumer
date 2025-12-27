<?php
declare(strict_types=1);

namespace Domain\Medias\CatalogMedias\CatalogVideoDetails\Models;

use Domain\Medias\CatalogMedias\CatalogVideoDetails\Enums\CatalogVideoDetailEnum;
use Domain\Medias\CatalogMedias\CatalogVideos\Models\CatalogVideo;
use Domain\Medias\Shared\VideoTypes\Models\VideoType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
