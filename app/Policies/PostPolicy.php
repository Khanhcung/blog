<?php

namespace App\Policies;

use App\Model\admin\admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\User  $user
     * @param  \App\post  $post
     * @return mixed
     */
    public function view(admin $user)
    {
        //
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(admin $user)
    {
       return $this->getPermission($user,6);
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\post  $post
     * @return mixed
     */
    public function update(admin $user)
    {
        return $this->getPermission($user,7);
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\post  $post
     * @return mixed
     */
    public function delete(admin $user)
    {
        return $this->getPermission($user,8);
    }
    public function tag(admin $user)
    {
        return $this->getPermission($user,9);
    }
    public function cate(admin $user)
    {
        return $this->getPermission($user,10);
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
