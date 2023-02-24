<?php

namespace App\Providers;

use DB;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer('frontend/layouts/layout', function($view) {
            $settings = DB::table('bank_data')->get();
            $view->with('data_bank', $settings);
        });
    }
}