<?php

namespace App\Policies;

use App\Models\Condition;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConditionPolicy
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
            return auth()->user()->hasPermissionTo('Index-Condition')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Index Condition');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Index-Condition')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Index Condition');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Index-Condition')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Index Condition');
         }
         else{
           return  auth()->user()->hasPermissionTo('Index-Condition')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Index Condition');
         }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Condition  $condition
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
            return auth()->user()->hasPermissionTo('Create-Condition')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Create Condition');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Create-Condition')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Condition');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Create-Condition')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Condition');
         }
         else{
           return  auth()->user()->hasPermissionTo('Create-Condition')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Condition');
         }    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Condition  $condition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-Condition')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Edit Condition');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Edit-Condition')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Condition');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Edit-Condition')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Condition');
         }
         else{
           return  auth()->user()->hasPermissionTo('Edit-Condition')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Condition');
         }    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Condition  $condition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-Condition')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Delete Condition');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Delete-Condition')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Condition');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Delete-Condition')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Condition');
         }
         else{
           return  auth()->user()->hasPermissionTo('Delete-Condition')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Condition');
         }    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Condition  $condition
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
     * @param  \App\Models\Condition  $condition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete()
    {
        //
    }
}
