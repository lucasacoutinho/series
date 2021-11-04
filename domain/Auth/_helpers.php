<?php

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

if (!function_exists('getAuthenticatedUser')) {
    function getAuthenticatedUser(): User
    {
        return Auth::guard('api')->user();
    }
}

if (!function_exists('authenticatedUserIsAdmin')) {
    function authenticatedUserIsAdmin(): bool
    {
        return getAuthenticatedUser()->hasRole(Role::where('is_admin', true)->firstOrFail()) ? true : false;
    }
}

if (!function_exists('authenticatedUserHasPermission')) {
    function authenticatedUserHasPermission(string $permission): bool
    {
        return getAuthenticatedUser()->can($permission);
    }
}
