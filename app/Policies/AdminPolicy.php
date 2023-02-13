<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
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

        // $guard = auth('admin')->check();
            if(auth('admin')->check()){
                return auth()->user()->hasPermissionTo('Index-Admin')
                 ?  $this->allow()
                 : $this->deny(' can not open Index-Admin');
             }
             elseif(auth('trainer')->check()){
                return auth()->user()->hasPermissionTo('Index-Admin')
                 ?  $this->allow()
                 : $this->deny(' can not open Index-Admin');
             }
             elseif(auth('employee')->check()){
                return auth()->user()->hasPermissionTo('Index-Admin')
                 ?  $this->allow()
                 : $this->deny(' can not open Index-Admin');
             }
             else
             {
               return  auth()->user()->hasPermissionTo('Index-Admin')
                 ?  $this->allow()
                 : $this->deny(' can not open Index-Admin');
             }
        // return auth($guard)->check() && auth($guard)->user()->hasPermissionTo('Index-Admin')
        // ?  $this->allow()
        // : $this->deny(' can not show index admin');




    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
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

        $guard = auth('admin')->check();
            if(auth('admin')->check()){
                return auth()->user()->hasPermissionTo('Create-Admin')
                 ?  $this->allow()
                 : $this->deny(' can not open Create-Admin');
             }
             elseif(auth('trainer')->check()){
                return auth()->user()->hasPermissionTo('Create-Admin')
                 ?  $this->allow()
                 : $this->deny(' can not open Create-Admin');
             }
             elseif(auth('employee')->check()){
                return auth()->user()->hasPermissionTo('Create-Admin')
                 ?  $this->allow()
                 : $this->deny(' can not open Create-Admin');
             }
             else
             {
               return  auth()->user()->hasPermissionTo('Create-Admin')
                 ?  $this->allow()
                 : $this->deny(' can not open Create-Admin');
             }
        return auth($guard)->check() && auth($guard)->user()->hasPermissionTo('Create-Admin')
        ?  $this->allow()
        : $this->deny(' can not show Create admin');




    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        // return $admin->hasPermissionTo('Edit-Admin')
        // ?  $this->allow()
        // :   $this->deny('tHIS iS CANT EDIT ADMIN');

        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-Admin')
             ?  $this->allow()
             : $this->deny(' THIS iS CANT EDIT ADMIN');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Edit-Admin')
             ?  $this->allow()
             : $this->deny('THIS iS CANT EDIT ADMIN');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Edit-Admin')
             ?  $this->allow()
             : $this->deny('THIS iS CANT EDIT ADMIN');
         }
         else

         {
           return  auth()->user()->hasPermissionTo('Edit-Admin')
             ?  $this->allow()
             : $this->deny('THIS iS CANT EDIT ADMIN');
         }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        // return $admin->hasPermissionTo('Delete-Admin')
        // ?  $this->allow()
        // :   $this->deny('tHIS iS CANT DELETE ADMIN');

        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-Admin')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Admin');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Delete-Admin')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Admin');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Delete-Admin')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Admin');
         }
         else{
           return  auth()->user()->hasPermissionTo('Delete-Admin')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Admin');
         }

    }
    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-Admin')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Admin');
         }
         elseif(auth('trainer')->check()){
            return auth()->user()->hasPermissionTo('Delete-Admin')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Admin');
         }
         elseif(auth('employee')->check()){
            return auth()->user()->hasPermissionTo('Delete-Admin')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Admin');
         }
         else{
           return  auth()->user()->hasPermissionTo('Delete-Admin')
             ?  $this->allow()
             : $this->deny(' can not open Delete-Admin');
         }
    }
}
