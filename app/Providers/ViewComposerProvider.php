<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use MongoDB\BSON\UTCDateTime;

class ViewComposerProvider extends ServiceProvider
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
        view()->composer( [
            'admin.*'
        ], function ($view){
            $employee = Auth::guard('employee')->user();
            if (Auth::guard('employee')->check()) {
                $employee->last_activity = new UTCDateTime(time() * 1000);
                $employee->save();
            }
            $view->with('employee', $employee);
        });
    }
}
