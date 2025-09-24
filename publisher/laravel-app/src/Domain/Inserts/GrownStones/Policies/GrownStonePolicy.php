<?php
declare(strict_types=1);

namespace Domain\Inserts\GrownStones\Policies;

use Domain\Inserts\GrownStones\Models\GrownStone;
use Domain\Users\Admins\Models\Admin;

class GrownStonePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $admin): bool
    {
//        if ($admin->hasRole('admin')) {
//            return true;
//        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $admin, GrownStone $grownStone): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $admin): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $admin, GrownStone $grownStone): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $admin, GrownStone $grownStone): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $admin, GrownStone $grownStone): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $admin, GrownStone $grownStone): bool
    {
        return false;
    }
}
