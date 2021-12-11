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
                ->icon('flow-branch');
        });

        $this->bootAddonConfig();

        $this->bootEnvBar();
    }

    protected function bootEnvBar()
    {
        $envBar = new EnvBar();
        Statamic::provideToScript([
            'plugrbase_env_bar_enabled' => $envBar->isEnabled(),
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
