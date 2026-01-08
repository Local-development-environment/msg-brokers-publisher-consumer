<?php
declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\LengthNames\Models;

use Domain\Shared\JewelleryProperties\LengthNames\Enums\LengthNameEnum;
use Domain\Shared\JewelleryProperties\NeckSizes\Models\NeckSize;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class LengthName extends Model
{
    protected $table = LengthNameEnum::TABLE_NAME->value;
    protected $fillable = ['name', 'slug', 'description'];

    public const string TYPE_RESOURCE = LengthNameEnum::TYPE_RESOURCE->value;

    public function neckSizes(): HasMany
    {
        return $this->hasMany(NeckSize::class);
    }
}
