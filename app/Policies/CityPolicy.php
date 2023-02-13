<?php

namespace App\Policies;

use App\Models\City;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny( )
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Index-City')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT INDEX CITY');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Index-City')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX CITY');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Index-City')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX CITY');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Index-City')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX CITY');
         }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\City  $citis
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user,City $citis)
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
            return auth()->user()->hasPermissionTo('Create-City')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT CREATE CITY');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Create-City')
             ?  $this->allow()
             : $this->deny('THIS iS CANT CREATE CITY');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Create-City')
             ?  $this->allow()
             : $this->deny('THIS iS CANT CREATE CITY');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Create-City')
             ?  $this->allow()
             : $this->deny('THIS iS CANT CREATE CITY');
         }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\City  $citis
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {

        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-City')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT EDIT CITY');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Edit-City')
             ?  $this->allow()
             : $this->deny('THIS iS CANT EDIT CITY');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Edit-City')
             ?  $this->allow()
             : $this->deny('THIS iS CANT EDIT CITY');
         }
         else{
           return  auth()->user()->hasPermissionTo('Edit-City')
             ?  $this->allow()
             : $this->deny('THIS iS CANT EDIT CITY');
         }



       
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\City  $citis
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-City')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT DELETE CITY');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Delete-City')
             ?  $this->allow()
             : $this->deny('THIS iS CANT DELETE CITY');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Delete-City')
             ?  $this->allow()
             : $this->deny('THIS iS CANT DELETE CITY');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Delete-City')
             ?  $this->allow()
             : $this->deny('THIS iS CANT DELETE CITY');
         }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\City  $citis
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(City $citis)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\City  $citis
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete( City $citis)
    {
        return $citis->hasPermissionTo('Delete-City')
        ?  $this->allow()
        :   $this->deny('THIS iS CANT DELETE CITY');
    }
}