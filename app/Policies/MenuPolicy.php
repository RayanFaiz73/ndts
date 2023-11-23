<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\Menu;

class MenuPolicy
{
    use HandlesAuthorization;

    /**
    * Stores current menu id.
    *
    * @var int
    */
    protected $menu_id;

    /**
    * Create a new policy instance.
    *
    * @return void
    */
    public function __construct(){
        $menu = Menu::where(["name" => "Menu"])->first();
        $this->menu_id = $menu->id;
    }

    /**
    * Determine if the given user can create.
    *
    * @param  App\Models\User  $user
    *
    * @return bool
    */
    public function create(User $user){
        return $user->hasPermissions($this->menu_id)->create;
    }

    /**
    * Determine if the given user can read.
    *
    * @param  App\Models\User  $user
    *
    * @return bool
    */
    public function read(User $user){
        return $user->hasPermissions($this->menu_id)->read;
    }

    /**
    * Determine if the given user can update.
    *
    * @param  App\Models\User  $user
    *
    * @return bool
    */
    public function update(User $user){
        return $user->hasPermissions($this->menu_id)->update;
    }

    /**
    * Determine if the given user can delete.
    *
    * @param  App\Models\User  $user
    *
    * @return bool
    */
    public function delete(User $user){
        return $user->hasPermissions($this->menu_id)->delete;
    }
}
