<?php
declare(strict_types=1);

namespace Domain\Medias\MediaCatalog\JewelleryPictures\Models;

use Domain\Medias\MediaCatalog\JewelleryPictures\Enums\JewelleryPictureEnum;
use Domain\Medias\MediaCatalog\MediaCatalog\Models\MediaCatalog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class JewelleryPicture extends Model
{
    protected $table = JewelleryPictureEnum::TABLE_NAME->value;

    protected $fillable = ['alt_name','extension','src','is_active'];

    public const string TYPE_RESOURCE = JewelleryPictureEnum::TYPE_RESOURCE->value;

    public function mediaCatalog(): BelongsTo
    {
        return $this->belongsTo(MediaCatalog::class);
    }
}
