<?php

namespace JewelleryDomain\Jewelleries\Inserts\StoneGroups\Policies;

use JewelleryDomain\Jewelleries\Inserts\StoneGroups\Models\StoneGroup;
use UserDomain\Users\Admins\Models\Admin;

class StoneGroupPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $admin): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $admin, StoneGroup $stoneGroup): bool
    {
        return true;
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
    public function update(Admin $admin, StoneGroup $stoneGroup): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $admin, StoneGroup $stoneGroup): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $admin, StoneGroup $stoneGroup): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $admin, StoneGroup $stoneGroup): bool
    {
        return false;
    }
}
