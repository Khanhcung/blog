<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //post policy
        Gate::resource('posts', 'App\Policies\PostPolicy');

        Gate::define('posts.tag','App\Policies\PostPolicy@tag');

        Gate::define('posts.cate','App\Policies\PostPolicy@cate');

        // admin/user policy
        Gate::resource('users','App\Policies\AdminPolicy');

        Gate::define('users.role', 'App\Policies\AdminPolicy@role');
        
        Gate::define('users.permission', 'App\Policies\AdminPolicy@permission');


    }
}
