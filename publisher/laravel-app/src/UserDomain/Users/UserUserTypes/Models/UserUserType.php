<?php

declare(strict_types=1);

namespace UserDomain\Users\UserUserTypes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use UserDomain\Users\Admins\Models\Admin;
use UserDomain\Users\Customers\Models\Customer;
use UserDomain\Users\Employees\Models\Employee;
use UserDomain\Users\Users\Models\User;
use UserDomain\Users\UserTypes\Models\UserType;
use UserDomain\Users\UserUserTypes\Enums\UserUserTypeEnum;

final class UserUserType extends Model
{
    protected $table = UserUserTypeEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = UserUserTypeEnum::RESOURCE->value;

    public function admin(): HasOne
    {
        return $this->hasOne(Admin::class);
    }

    public function customer(): HasOne
    {
        return $this->hasOne(Customer::class);
    }

    public function employee(): HasOne
    {
        return $this->hasOne(Employee::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function userType(): BelongsTo
    {
        return $this->belongsTo(UserType::class);
    }
}
