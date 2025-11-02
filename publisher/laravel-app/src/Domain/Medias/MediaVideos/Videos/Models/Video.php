<?php
declare(strict_types=1);

namespace Domain\Medias\MediaVideos\Videos\Models;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\Medias\MediaVideos\VideoDetails\Models\VideoDetail;
use Domain\Medias\MediaVideos\Videos\Enums\VideoEnum;
use Domain\Medias\Shared\Producers\Models\Producer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Video extends Model
{
    protected $table = VideoEnum::TABLE_NAME->value;
    protected $fillable = ['jewellery_id','producer_id','name','alt_name','is_active'];

    public const string TYPE_RESOURCE = VideoEnum::TYPE_RESOURCE->value;

    public function jewellery(): BelongsTo
    {
        return $this->belongsTo(Jewellery::class);
    }

    public function producer(): BelongsTo
    {
        return $this->belongsTo(Producer::class);
    }

    public function videoDetails(): HasMany
    {
        return $this->hasMany(VideoDetail::class);
    }
}
