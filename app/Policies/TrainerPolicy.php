<?php

namespace App\Policies;

use App\Models\Trainer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrainerPolicy
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
            return auth()->user()->hasPermissionTo('Index-Trainer')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT INDEX Trainer');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Index-Trainer')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX Trainer');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Index-Trainer')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX Trainer');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Index-Trainer')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX Trainer');
         }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Trainer  $trainer
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
            return auth()->user()->hasPermissionTo('Create-Trainer')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Create Trainer');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Create-Trainer')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Trainer');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Create-Trainer')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Trainer');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Create-Trainer')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Trainer');
         }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Trainer  $trainer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-Trainer')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Edit Trainer');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Edit-Trainer')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Trainer');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Edit-Trainer')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Trainer');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Edit-Trainer')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Trainer');
         }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Trainer  $trainer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-Trainer')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Delete Trainer');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Delete-Trainer')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Trainer');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Delete-Trainer')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Trainer');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Delete-Trainer')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Trainer');
         }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Trainer  $trainer
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
     * @param  \App\Models\Trainer  $trainer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete()
    {
        //
    }
}
