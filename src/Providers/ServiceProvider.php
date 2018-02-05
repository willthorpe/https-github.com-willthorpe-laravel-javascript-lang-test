<?php

namespace PodPoint\JsLang\Providers;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Illuminate\Contracts\View\Factory;
use PodPoint\JsLang\ViewComposers\ViewComposer;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @param Factory $view
     * @return void
     */
    public function boot(Factory $view)
    {
        $this->publishes([
            __DIR__ . '/../../config/javascript.php' => config_path('javascript.php'),
        ]);

        $view->composer('*', ViewComposer::class);
    }
}
