<?php

namespace App\Policies;

use App\Models\fileCourse;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FileCoursePolicy
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
            return auth()->user()->hasPermissionTo('Index-FileCourse')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT INDEX FileCourse');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Index-FileCourse')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX FileCourse');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Index-FileCourse')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX FileCourse');
         }
         else{
           return  auth()->user()->hasPermissionTo('Index-FileCourse')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX FileCourse');
         
             }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FileCourse  $fileCourse
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
            return auth()->user()->hasPermissionTo('Create-FileCourse')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Create FileCourse');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Create-FileCourse')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create FileCourse');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Create-FileCourse')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create FileCourse');
         }
         else{
           return  auth()->user()->hasPermissionTo('Create-FileCourse')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create FileCourse');
         
             }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FileCourse  $fileCourse
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-FileCourse')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Edit FileCourse');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Edit-FileCourse')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit FileCourse');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Edit-FileCourse')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit FileCourse');
         }
         else{
           return  auth()->user()->hasPermissionTo('Edit-FileCourse')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit FileCourse');
         
             }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FileCourse  $fileCourse
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-FileCourse')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Delete FileCourse');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Delete-FileCourse')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete FileCourse');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Delete-FileCourse')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete FileCourse');
         }
         else{
           return  auth()->user()->hasPermissionTo('Delete-FileCourse')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete FileCourse');
         
             }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FileCourse  $fileCourse
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
     * @param  \App\Models\FileCourse  $fileCourse
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete()
    {
        //
    }
}
