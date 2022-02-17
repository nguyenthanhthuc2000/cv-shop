<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
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
        View::composer( '*', function ($view) {
            $data = [
                'setting' => Setting::find(1),
                'categories' => Category::where('level', 0)->where('status', 1)->get()
            ];
            $view->with($data);
        });
    }
}
