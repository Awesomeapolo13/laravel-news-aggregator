<?php


namespace App\Providers;


use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{

    public function register()
    {
        foreach (glob(app_path('Helpers') . '/*.php') as $file)
        {
            require_once $file;
        }
    }
}
