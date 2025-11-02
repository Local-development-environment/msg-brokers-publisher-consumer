<?php
declare(strict_types=1);

namespace Domain\Medias\MediaPictures\Pictures\Models;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\Medias\MediaPictures\Pictures\Enums\PictureEnum;
use Domain\Medias\Shared\Producers\Models\Producer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Picture extends Model
{
    protected $table = PictureEnum::TABLE_NAME->value;
    protected $fillable = ['jewellery_id','producer_id','name','alt_name','extension','src','type','is_active'];

    public const string TYPE_RESOURCE = PictureEnum::TYPE_RESOURCE->value;

    public function jewellery(): BelongsTo
    {
        return $this->belongsTo(Jewellery::class);
    }

    public function producer(): BelongsTo
    {
        return $this->belongsTo(Producer::class);
    }
}
