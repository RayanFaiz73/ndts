<?php

use App\Models\SiteSetting;

function siteSetting($key)
{
    $setting = SiteSetting::where('key', $key)->first();
    if (!empty($setting)) {
        return $setting->value;
    } else {
        return 'Invalid key';
    }
}


// function recursiveHelper($array, $keysString = '')
// {
//     if (is_array($array)) {
//         foreach ($array as $key => $value) {
//             recursiveHelper($value, $keysString . $key . '.');
//         }
//     } else {
//         echo $keysString . $array . '<br/> ';
//     }
// }


function textCrop($string, $length)
{
    $content = strip_tags($string);
    if (strlen($content) <= $length) {
        return  $content;
    } else {
        $result = substr($content, 0, $length) . '...';
        return  $result;
    }
}

function PolicyContent($policyName,$name)
{
    return
        '<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\Menu;

class ' . $policyName . 'Policy
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
        $menu = Menu::where(["name" => "' . $name . '"])->first();

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
}';
}
