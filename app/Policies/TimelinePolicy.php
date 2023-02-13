<?php

namespace App\Policies;

use App\Models\Timeline;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TimelinePolicy
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
            return auth()->user()->hasPermissionTo('Index-TimeLine')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT INDEX TimeLine');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Index-TimeLine')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX TimeLine');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Index-TimeLine')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX TimeLine');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Index-TimeLine')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX TimeLine');
         }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Timeline  $timeline
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
            return auth()->user()->hasPermissionTo('Create-TimeLine')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Create TimeLine');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Create-TimeLine')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create TimeLine');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Create-TimeLine')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create TimeLine');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Create-TimeLine')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create TimeLine');
         }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Timeline  $timeline
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-TimeLine')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Edit TimeLine');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Edit-TimeLine')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit TimeLine');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Edit-TimeLine')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit TimeLine');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Edit-TimeLine')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit TimeLine');
         }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Timeline  $timeline
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-TimeLine')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Delete TimeLine');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Delete-TimeLine')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete TimeLine');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Delete-TimeLine')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete TimeLine');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Delete-TimeLine')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete TimeLine');
         }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Timeline  $timeline
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
     * @param  \App\Models\Timeline  $timeline
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete()
    {
        //
    }
}
