<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\GroupGrades\Policies;

use JewelleryDomain\Jewelleries\Inserts\GroupGrades\Models\GroupGrade;
use UserDomain\Users\Admins\Models\Admin;

final class GroupGradePolicy
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
    public function view(Admin $admin, GroupGrade $naturalStoneGrade): bool
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
    public function update(Admin $admin, GroupGrade $naturalStoneGrade): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $admin, GroupGrade $naturalStoneGrade): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $admin, GroupGrade $naturalStoneGrade): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $admin, GroupGrade $naturalStoneGrade): bool
    {
        return false;
    }
}
