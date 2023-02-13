<?php

namespace App\Policies;

use App\Models\Group;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Index-Group')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT INDEX Group');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Index-Group')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX Group');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Index-Group')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX Group');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Index-Group')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX Group');
         }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view()
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Create-Group')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Create Group');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Create-Group')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Group');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Create-Group')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Group');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Create-Group')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Group');
         }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-Group')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Edit Group');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Edit-Group')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Group');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Edit-Group')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Group');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Edit-Group')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Group');
         }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-Group')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT INDEX Group');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Delete-Group')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Group');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Delete-Group')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Group');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Delete-Group')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Group');
         }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore()
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete()
    {
        //
    }
}
