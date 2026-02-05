<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\Inserts\Repositories\Relationships;

use JewelleryDomain\Jewelleries\Inserts\InsertOptionalInfos\Models\InsertOptionalInfo;
use JewelleryDomain\Jewelleries\Inserts\Inserts\Models\Insert;

final class InsertInsertOptionalInfoRelationshipRepository
{
    public function index(int $id): InsertOptionalInfo|null
    {
        return Insert::findOrFail($id)->insertOptionalInfo;
    }
}
