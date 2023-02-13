<?php

namespace App\Policies;

use App\Models\Student;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentPolicy
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
            return auth()->user()->hasPermissionTo('Index-Student')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT INDEX Student');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Index-Student')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX Student');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Index-Student')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX Student');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Index-Student')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX Student');
         }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Student  $student
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
            return auth()->user()->hasPermissionTo('Create-Student')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Create Student');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Create-Student')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Student');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Create-Student')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Student');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Create-Student')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Student');
         }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-Student')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Edit Student');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Edit-Student')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Student');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Edit-Student')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Student');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Edit-Student')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Student');
         }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-Student')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Delete Student');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Delete-Student')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Student');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Delete-Student')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Student');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Delete-Student')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Student');
         }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Student  $student
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
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-Student')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Delete Student');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Delete-Student')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Student');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Delete-Student')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Student');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Delete-Student')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Student');
            }
    }
}
