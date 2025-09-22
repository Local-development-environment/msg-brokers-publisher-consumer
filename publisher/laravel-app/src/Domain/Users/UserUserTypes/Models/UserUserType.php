<?php

declare(strict_types=1);

namespace Domain\Users\UserUserTypes\Models;

use Domain\Users\Admins\Models\Admin;
use Domain\Users\Customers\Models\Customer;
use Domain\Users\Employees\Models\Employee;
use Domain\Users\Users\Models\User;
use Domain\Users\UserTypes\Models\UserType;
use Domain\Users\UserUserTypes\Enums\UserUserTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

final class UserUserType extends Model
{
    protected $table = UserUserTypeEnum::TABLE->value;

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