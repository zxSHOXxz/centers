<?php

namespace App\Policies;

use App\Models\Room;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoomPolicy
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
            return auth()->user()->hasPermissionTo('Index-Room')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT INDEX Room');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Index-Room')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX Room');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Index-Room')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX Room');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Index-Room')
             ?  $this->allow()
             : $this->deny('THIS iS CANT INDEX Room');
         }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Room  $room
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
            return auth()->user()->hasPermissionTo('Create-Room')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Create Room');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Create-Room')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Room');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Create-Room')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Room');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Create-Room')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Create Room');
         }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-Room')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Edit Room');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Edit-Room')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Room');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Edit-Room')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Room');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Edit-Room')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Edit Room');
         }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-Room')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT Delete Room');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Delete-Room')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Room');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Delete-Room')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Room');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Delete-Room')
             ?  $this->allow()
             : $this->deny('THIS iS CANT Delete Room');
         }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Room  $room
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
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete()
    {
        //
    }
}
