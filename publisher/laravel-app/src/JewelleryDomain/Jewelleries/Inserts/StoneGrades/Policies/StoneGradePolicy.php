<?php

namespace JewelleryDomain\Jewelleries\Inserts\StoneGrades\Policies;

use JewelleryDomain\Jewelleries\Inserts\StoneGrades\Models\StoneGrade;
use UserDomain\Users\Admins\Models\Admin;

class StoneGradePolicy
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
    public function view(Admin $admin, StoneGrade $stoneGrade): bool
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
    public function update(Admin $admin, StoneGrade $stoneGrade): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $admin, StoneGrade $stoneGrade): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $admin, StoneGrade $stoneGrade): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $admin, StoneGrade $stoneGrade): bool
    {
        return false;
    }
}
