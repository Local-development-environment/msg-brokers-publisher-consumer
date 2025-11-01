<?php
declare(strict_types=1);

namespace Domain\Medias\Shared\Producers\Models;

use Domain\Medias\MediaPictures\Pictures\Models\Picture;
use Domain\Medias\MediaVideos\Videos\Models\Video;
use Domain\Medias\Shared\Producers\Enums\ProducerEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Producer extends Model
{
    protected $table = ProducerEnum::TABLE_NAME->value;
    protected $fillable = ['name','slug','is_active'];

    public const string TYPE_RESOURCE = ProducerEnum::TYPE_RESOURCE->value;

    public function videos(): HasMany
    {
        return $this->hasMany(Video::class);
    }

    public function pictures(): HasMany
    {
        return $this->hasMany(Picture::class);
    }
}
