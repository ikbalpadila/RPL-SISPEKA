<?php

namespace App\Services\Auth;
use App\Models\User;

class AuthService
{
    /**
     * Create a new class instance.
     */
    public function assignRole(User $user, string $role)
    {
        $user->role = $role;
        $user->save();
    }
}
