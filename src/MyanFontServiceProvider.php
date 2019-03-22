<?php

namespace Tintnaingwin\MyanFont;

use Illuminate\Support\ServiceProvider;

class MyanFontServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/myanfont.php' => config_path('myanfont.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/myanfont.php', 'myanfont');
    }
}
