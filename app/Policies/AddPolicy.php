<?php

namespace App\Policies;

use App\User;
use App\Add;
use Illuminate\Auth\Access\HandlesAuthorization;

class AddPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any adds.
     *@param  \App\User  $user
     * @return mixed
     */

    public function update(User $user , Add $add){

        return $add->owner_id == $user->id||$user->role==='admin';

    }

}
