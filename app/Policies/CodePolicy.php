<?php

namespace App\Policies;

use App\Models\Code;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CodePolicy
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
            return auth()->user()->hasPermissionTo('Index-Code')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Index Code');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Index-Code')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Index Code');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Index-Code')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Index Code');
         }
         else{
           return  auth()->user()->hasPermissionTo('Index-Code')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Index Code');
         }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Code  $code
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
            return auth()->user()->hasPermissionTo('Create-Code')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Create Code');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Create-Code')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Code');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Create-Code')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Code');
         }
         else{
           return  auth()->user()->hasPermissionTo('Create-Code')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Code');
         } 

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-Code')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Edit Code');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Edit-Code')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Code');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Edit-Code')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Code');
         }
         else{
           return  auth()->user()->hasPermissionTo('Edit-Code')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Code');
         } 
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-Code')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Delete Code');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Delete-Code')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Code');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Delete-Code')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Code');
         }
         else{
           return  auth()->user()->hasPermissionTo('Delete-Code')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Code');
         } 
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Code  $code
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
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete()
    {
        //
    }
}
