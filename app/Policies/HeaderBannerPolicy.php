<?php

namespace App\Policies;

use App\Models\HeaderBanner;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class HeaderBannerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
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
    public function update(User $user, HeaderBanner $headerBanner): bool
    {
        return $user->roll === "admin";

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, HeaderBanner $headerBanner): bool
    {
        return $user->roll === "admin";

    }

}
