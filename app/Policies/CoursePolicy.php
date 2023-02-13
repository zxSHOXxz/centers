<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
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
            return auth()->user()->hasPermissionTo('Index-Course')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Index Course');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Index-Course')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Index Course');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Index-Course')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Index Course');
         }
         else{
           return  auth()->user()->hasPermissionTo('Index-Course')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Index Course');
         }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Course  $course
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
            return auth()->user()->hasPermissionTo('Create-Course')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Create Course');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Create-Course')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Course');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Create-Course')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Course');
         }
         else{
           return  auth()->user()->hasPermissionTo('Create-Course')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Course');
         }    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-Course')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Edit Course');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Edit-Course')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Course');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Edit-Course')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Course');
         }
         else{
           return  auth()->user()->hasPermissionTo('Edit-Course')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Course');
         }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-Course')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Delete Course');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Delete-Course')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Course');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Delete-Course')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Course');
         }
         else{
           return  auth()->user()->hasPermissionTo('Delete-Course')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Course');
         }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Course  $course
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
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete()
    {
        //
    }
}
