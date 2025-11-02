<?php
declare(strict_types=1);

namespace Domain\JewelleryProperties\Brooches\Brooches\Models;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\JewelleryProperties\Brooches\Brooches\Enums\BroochEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Brooch extends Model
{
    protected $table = BroochEnum::TABLE_NAME->value;
    protected $fillable = ['quantity','price','id', 'dimensions'];

    public const string TYPE_RESOURCE = BroochEnum::TYPE_RESOURCE->value;

    public function jewellery(): BelongsTo
    {
        return $this->belongsTo(Jewellery::class, 'id');
    }
}
