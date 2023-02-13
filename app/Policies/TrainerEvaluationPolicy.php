<?php

namespace App\Policies;

use App\Models\TrainerEvaluation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrainerEvaluationPolicy
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
            return auth()->user()->hasPermissionTo('Index-TrainerEvaluation')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT INDEX TrainerEvaluation');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Index-TrainerEvaluation')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX TrainerEvaluation');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Index-TrainerEvaluation')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX TrainerEvaluation');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Index-TrainerEvaluation')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX TrainerEvaluation');
         }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TrainerEvaluation  $trainerEvaluation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view()
    {
        
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
            return auth()->user()->hasPermissionTo('Create-TrainerEvaluation')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Create TrainerEvaluation');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Create-TrainerEvaluation')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create TrainerEvaluation');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Create-TrainerEvaluation')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create TrainerEvaluation');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Create-TrainerEvaluation')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create TrainerEvaluation');
         }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TrainerEvaluation  $trainerEvaluation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-TrainerEvaluation')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Edit TrainerEvaluation');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Edit-TrainerEvaluation')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit TrainerEvaluation');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Edit-TrainerEvaluation')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit TrainerEvaluation');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Edit-TrainerEvaluation')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit TrainerEvaluation');
         }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TrainerEvaluation  $trainerEvaluation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-TrainerEvaluation')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Delete TrainerEvaluation');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Delete-TrainerEvaluation')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete TrainerEvaluation');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Delete-TrainerEvaluation')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete TrainerEvaluation');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Delete-TrainerEvaluation')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete TrainerEvaluation');
         }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TrainerEvaluation  $trainerEvaluation
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
     * @param  \App\Models\TrainerEvaluation  $trainerEvaluation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete()
    {
        //
    }
}
