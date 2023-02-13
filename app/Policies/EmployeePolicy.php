<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePolicy
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
            return auth()->user()->hasPermissionTo('Index-Employee')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT INDEX Employee');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Index-Employee')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX Employee');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Index-Employee')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX Employee');
         }
         else{
           return  auth()->user()->hasPermissionTo('Index-Employee')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX Employee');
         }
        
        
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Employee  $employee
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
            return auth()->user()->hasPermissionTo('Create-Employee')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Create Employee');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Create-Employee')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Employee');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Create-Employee')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Employee');
         }
         else{
           return  auth()->user()->hasPermissionTo('Create-Employee')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Employee');
         }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-Employee')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Edit Employee');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Edit-Employee')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Employee');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Edit-Employee')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Employee');
         }
         else{
           return  auth()->user()->hasPermissionTo('Edit-Employee')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Employee');
         }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-Employee')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Delete Employee');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Delete-Employee')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Employee');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Delete-Employee')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Employee');
         }
         else{
           return  auth()->user()->hasPermissionTo('Delete-Employee')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Employee');
         }
        
    }
    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Employee  $employee
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
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Employee $employee)
    {
        return $employee->hasPermissionTo('Delete-Employee')
        ?  $this->allow()
        :   $this->deny('tHIS iS CANT DELETE employee');
    }
}