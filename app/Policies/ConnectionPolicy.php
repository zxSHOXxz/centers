<?php

namespace App\Policies;

use App\Models\Connection;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConnectionPolicy
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
            return auth()->user()->hasPermissionTo('Index-Connection')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Index Connection');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Index-Connection')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Index Connection');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Index-Connection')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Index Connection');
         }
         else{
           return  auth()->user()->hasPermissionTo('Index-Connection')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Index Connection');
         }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Connection  $connection
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
            return auth()->user()->hasPermissionTo('Create-Connection')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Create Connection');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Create-Connection')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Connection');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Create-Connection')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Connection');
         }
         else{
           return  auth()->user()->hasPermissionTo('Create-Connection')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Connection');
         }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Connection  $connection
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('EditCreate-Connection')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT EditCreate Connection');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('EditCreate-Connection')
             ?  $this->allow()
             : $this->deny('THIS iS CANT EditCreate Connection');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('EditCreate-Connection')
             ?  $this->allow()
             : $this->deny('THIS iS CANT EditCreate Connection');
         }
         else{
           return  auth()->user()->hasPermissionTo('EditCreate-Connection')
             ?  $this->allow()
             : $this->deny('THIS iS CANT EditCreate Connection');
         }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Connection  $connection
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-Connection')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Delete Connection');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Delete-Connection')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Connection');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Delete-Connection')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Connection');
         }
         else{
           return  auth()->user()->hasPermissionTo('Delete-Connection')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Connection');
         }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Connection  $connection
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
     * @param  \App\Models\Connection  $connection
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete()
    {
        //
    }
}
