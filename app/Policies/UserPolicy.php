<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the current user can see the list of users
     *
     * @return boolean
     */
    public function index(User $current_user)
    {
        return $current_user->is('admin');
    }

    /**
     * Determine if the current user can create a new user.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function store(User $current_user)
    {
        return $current_user->is('admin');
    }

    /**
     * Determine if the given user can be updated by the current user.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return boolean
     */
    public function update(User $current_user, User $user)
    {
        return $current_user->is('admin');
    }

    /**
     * Determine if the given user can be delete users
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return boolean
     */
    public function destroy(User $current_user, User $user)
    {
        return $current_user->is('superadmin');
    }

    /**
     * Determine if the given user can update admin status of a user
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return boolean
     */
    public function setAdminStatus(User $current_user, User $user)
    {
        return $current_user->is('superadmin');
    }

    /**
     * Intercept all checks for superadmin user
     * @param  \App\User $user    [description]
     * @return  boolean
     */
    public function before(User $user)
    {
        if ($user->is('superadmin')) {
            return true;
        }
    }
}
