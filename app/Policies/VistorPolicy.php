<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vistor;
use Illuminate\Auth\Access\HandlesAuthorization;

class VistorPolicy
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
            return auth()->user()->hasPermissionTo('Index-Vistor')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT INDEX Vistor');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Index-Vistor')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX Vistor');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Index-Vistor')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX Vistor');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Index-Vistor')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX Vistor');
         }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vistor  $vistor
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
            return auth()->user()->hasPermissionTo('Create-Vistor')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Create Vistor');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Create-Vistor')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Vistor');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Create-Vistor')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Vistor');
         }
         else
    
         {
           return  auth()->user()->hasPermissionTo('Create-Vistor')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Vistor');
         }
        
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vistor  $vistor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-Vistor')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Edit Vistor');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Edit-Vistor')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Vistor');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Edit-Vistor')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Vistor');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Edit-Vistor')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Vistor');
         }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vistor  $vistor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-Vistor')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Delete Vistor');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Delete-Vistor')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Vistor');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Delete-Vistor')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Vistor');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Delete-Vistor')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Vistor');
         }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vistor  $vistor
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
     * @param  \App\Models\Vistor  $vistor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete()
    {
        //
    }
}
