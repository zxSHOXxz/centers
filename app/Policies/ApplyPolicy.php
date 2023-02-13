<?php

namespace App\Policies;

use App\Models\Apply;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApplyPolicy
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
            return auth()->user()->hasPermissionTo('Index-Apply')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT INDEX Apply');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Index-Apply')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX Apply');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Index-Apply')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX Apply');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Index-Apply')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX Apply');
         }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Apply  $apply
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
            return auth()->user()->hasPermissionTo('Create-Apply')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Create Apply');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Create-Apply')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Apply');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Create-Apply')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Apply');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Create-Apply')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Apply');
         }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Apply  $apply
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-Apply')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Edit Apply');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Edit-Apply')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Apply');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Edit-Apply')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Apply');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Edit-Apply')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Apply');
         }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Apply  $apply
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-Apply')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Delete Apply');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Delete-Apply')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Apply');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Delete-Apply')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Apply');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Delete-Apply')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Apply');
         }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Apply  $apply
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
     * @param  \App\Models\Apply  $apply
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete()
    {
        //
    }
}
