<?php

namespace Plugrbase\EnvBar;

use Plugrbase\EnvBar\EnvBar;
use Plugrbase\EnvBar\Tags\EnvBar as EnvBarTag;
use Statamic\Statamic;
use Statamic\Facades\CP\Nav;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $tags = [
        EnvBarTag::class,
    ];

    protected $fieldtypes = [];

    protected $scripts = [
        __DIR__.'/../dist/js/cp.js'
    ];

    protected $stylesheets = [
        __DIR__.'/../dist/css/cp.css'
    ];

    protected $routes = [
        'cp' => __DIR__.'/../routes/cp.php',
    ];

    public function boot()
    {
        parent::boot();

        Nav::extend(function ($nav) {
            $nav->tools('EnvBar')
                ->route('plugrbase.envbar.settings.index')
                ->icon('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                   <g transform="matrix(3.4285714285714284,0,0,3.4285714285714284,0,0)"><g>
                    <rect x="0.5" y="0.5" width="13" height="13" rx="1" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></rect>
                    <line x1="0.5" y1="4" x2="13.5" y2="4" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></line>
                    <g>
                      <polyline points="4.5 7 3 8.5 4.5 10" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></polyline>
                      <polyline points="10 7 11.5 8.5 10 10" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></polyline>
                      <line x1="6.5" y1="10.5" x2="8" y2="6" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></line>
                    </g>
                  </g></g></svg>');
        });

        $this->bootAddonConfig();

        $this->bootEnvBar();
    }

    protected function bootEnvBar()
    {
        $envBar = new EnvBar();
        
        Statamic::provideToScript([
            'plugrbase_env_bar_enabled' => $envBar->isEnabled(),
            'plugrbase_env_bar_color' => $envBar->getColor(),
            'plugrbase_env_bar_message' => $envBar->getMessage()
        ]);
    }

    protected function bootAddonConfig()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/plugrbase_env_bar.php', 'statamic.plugrbase_env_bar');

        $this->publishes([
            __DIR__.'/../config/plugrbase_env_bar.php' => config_path('statamic/plugrbase_env_bar.php'),
        ], 'plugrbase-env-bar-config');

        return $this;
    }

    public function register()
    {
        parent::register();
    }
}
