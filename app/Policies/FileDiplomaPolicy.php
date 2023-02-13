<?php

namespace App\Policies;

use App\Models\fileDiploma;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FileDiplomaPolicy
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
            return auth()->user()->hasPermissionTo('Index-FileDiploma')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT INDEX FileDiploma');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Index-FileDiploma')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX FileDiploma');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Index-FileDiploma')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX FileDiploma');
         }
         else{
           return  auth()->user()->hasPermissionTo('Index-FileDiploma')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX FileDiploma');
         
             }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FileDiploma  $fileDiploma
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
            return auth()->user()->hasPermissionTo('Create-FileDiploma')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Create FileDiploma');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Create-FileDiploma')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create FileDiploma');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Create-FileDiploma')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create FileDiploma');
         }
         else{
           return  auth()->user()->hasPermissionTo('Create-FileDiploma')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create FileDiploma');
         
             }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FileDiploma  $fileDiploma
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-FileDiploma')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Edit FileDiploma');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Edit-FileDiploma')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit FileDiploma');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Edit-FileDiploma')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit FileDiploma');
         }
         else{
           return  auth()->user()->hasPermissionTo('Edit-FileDiploma')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit FileDiploma');
         
             }    
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FileDiploma  $fileDiploma
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-FileDiploma')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Delete FileDiploma');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Delete-FileDiploma')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete FileDiploma');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Delete-FileDiploma')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete FileDiploma');
         }
         else{
           return  auth()->user()->hasPermissionTo('Delete-FileDiploma')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete FileDiploma');
         
             }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FileDiploma  $fileDiploma
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, FileDiploma $fileDiploma)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FileDiploma  $fileDiploma
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, FileDiploma $fileDiploma)
    {
        //
    }
}
