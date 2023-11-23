<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Menu;
use Illuminate\Support\Facades\Log;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->modules = Menu::all();
        $this->registerPolicies();

        if($this->modules->isNotEmpty())
        {
            foreach ($this->modules as $key => $module) {
                $name = $module->name;
                $this->getAllPolicies($name);
            }
        }
    }

    function getAllPolicies($name)
    {
        Gate::define("$name-create", "App\Policies\\".$name."Policy@create");
        Gate::define("$name-read", "App\Policies\\".$name."Policy@read");
        Gate::define("$name-update", "App\Policies\\".$name."Policy@update");
        Gate::define("$name-delete", "App\Policies\\".$name."Policy@delete");
    }
}
