<?php
declare(strict_types=1);

namespace Domain\Medias\MediaCatalog\JewelleryVideoDetails\Models;

use Domain\Medias\MediaCatalog\JewelleryVideoDetails\Enums\JewelleryVideoDetailEnum;
use Domain\Medias\MediaCatalog\JewelleryVideos\Models\JewelleryVideo;
use Domain\Medias\Shared\VideoTypes\Models\VideoType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class JewelleryVideoDetail extends Model
{
    protected $table = JewelleryVideoDetailEnum::TABLE_NAME->value;

    protected $fillable = ['video_type_id','jewellery_video_id','src'];

    public const string TYPE_RESOURCE = JewelleryVideoDetailEnum::TYPE_RESOURCE->value;

    public function videoType(): BelongsTo
    {
        return $this->belongsTo(VideoType::class);
    }

    public function jewelleryVideo(): BelongsTo
    {
        return $this->belongsTo(JewelleryVideo::class);
    }
}
