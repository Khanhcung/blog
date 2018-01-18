<?php

namespace App\Policies;

use App\Model\admin\admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the admin.
     *
     * @param  \App\User  $user
     * @param  \App\admin  $admin
     * @return mixed
     */
    public function view(admin $user)
    {
        //
    }

    /**
     * Determine whether the user can create admins.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(admin $user)
    {
        return $this->getPermission($user,3);
    }

    /**
     * Determine whether the user can update the admin.
     *
     * @param  \App\User  $user
     * @param  \App\admin  $admin
     * @return mixed
     */
    public function update(admin $user)
    {
        return $this->getPermission($user,4);
    }

    /**
     * Determine whether the user can delete the admin.
     *
     * @param  \App\User  $user
     * @param  \App\admin  $admin
     * @return mixed
     */
    public function delete(admin $user)
    {
        return $this->getPermission($user,5);
    }
    public function role(admin $user)
    {
        return $this->getPermission($user,12);
    }
    public function permission(admin $user)
    {
        return $this->getPermission($user,11);
    }
    protected function getPermission($user,$p_id)
    {
        foreach ($user->roles as $role) {
          foreach ($role->permissions as $per) {
              if ($per->id == $p_id) {
                  return true;
              }
          }
       }
       return false;
    }
}
