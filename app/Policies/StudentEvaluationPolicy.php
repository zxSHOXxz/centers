<?php

namespace App\Policies;

use App\Models\Student_evaluation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentEvaluationPolicy
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
            return auth()->user()->hasPermissionTo('Index-StudentEvaluation')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT INDEX StudentEvaluation');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Index-StudentEvaluation')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX StudentEvaluation');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Index-StudentEvaluation')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX StudentEvaluation');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Index-StudentEvaluation')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX StudentEvaluation');
         }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StudentEvaluation  $studentEvaluation
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
            return auth()->user()->hasPermissionTo('Create-StudentEvaluation')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Create StudentEvaluation');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Create-StudentEvaluation')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create StudentEvaluation');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Create-StudentEvaluation')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create StudentEvaluation');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Create-StudentEvaluation')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create StudentEvaluation');
         }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StudentEvaluation  $studentEvaluation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-StudentEvaluation')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Edit StudentEvaluation');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Edit-StudentEvaluation')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit StudentEvaluation');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Edit-StudentEvaluation')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit StudentEvaluation');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Edit-StudentEvaluation')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit StudentEvaluation');
         }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StudentEvaluation  $studentEvaluation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-StudentEvaluation')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Delete StudentEvaluation');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Delete-StudentEvaluation')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete StudentEvaluation');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Delete-StudentEvaluation')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete StudentEvaluation');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Delete-StudentEvaluation')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete StudentEvaluation');
         }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StudentEvaluation  $studentEvaluation
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
     * @param  \App\Models\StudentEvaluation  $studentEvaluation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete()
    {
        //
    }
}
