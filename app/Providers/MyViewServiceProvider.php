<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\GlobalSetting as setting;
use App\Models\Social;

use Log;

class MyViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $view->with('pageGlobalData', $this->pageGlobalData());
        });
    }

    public function pageGlobalData(){
        $setting = Setting::first();
        $social = Social::first();


        $data = new \stdClass();
        $data->social = $social;
        $data->setting = $setting;


        return $data;
    }
}
