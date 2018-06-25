<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * 更新操作
     * @param User $currentUser
     * @param User $user
     * @return bool
     */
    public function update(User $currentUser, User $user){
        return $currentUser->id === $user->id;
    }

    /**
     * 管理员才能删除(且不能删除自己)
     * @param User $currentUser
     * @param User $user
     * @return bool
     */
    public function destroy(User $currentUser, User $user){
        return $currentUser->is_admin && $currentUser->id !== $user->id;
    }
}
