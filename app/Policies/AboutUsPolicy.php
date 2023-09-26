<?php

namespace App\Policies;

use App\Models\AboutUs;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AboutUsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->roll === "admin";
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AboutUs $aboutUs): bool
    {
        return $user->roll === "admin";
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->roll === "admin";
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, AboutUs $aboutUs): bool
    {
        return $user->roll === "admin";
    }

    /**
     * Determine whether the user can delete the model.
     */

}