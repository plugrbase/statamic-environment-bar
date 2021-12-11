<?php

namespace Plugrbase\EnvBar\Tests;

use Statamic\Extend\Manifest;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Plugrbase\EnvBar\ServiceProvider;
use Statamic\Facades\User;
use Statamic\Providers\StatamicServiceProvider;
use Statamic\Statamic;

abstract class TestCase extends OrchestraTestCase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            StatamicServiceProvider::class,
            ServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Statamic' => Statamic::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);

        $app->make(Manifest::class)->manifest = [
            'plugrbase/statamic-environment-bar' => [
                'id' => 'plugrbase/statamic-environment-bar',
                'namespace' => 'Plugrbase\\EnvBar\\',
            ],
        ];
    }

    protected function resolveApplicationConfiguration($app)
    {
        parent::resolveApplicationConfiguration($app);

        $configs = [
            'assets', 'cp', 'forms', 'static_caching',
            'sites', 'stache', 'system', 'users'
        ];

        foreach ($configs as $config) {
            $app['config']->set("statamic.$config", require(__DIR__."/../vendor/statamic/cms/config/{$config}.php"));
        }

        $app['config']->set('statamic.users.repository', 'file');

        $app['config']->set('statamic.plugrbase_env_bar', require(__DIR__.'/../config/plugrbase_env_bar.php'));

        Statamic::pushCpRoutes(function () {
            return require_once realpath(__DIR__.'/../routes/cp.php');
        });
    }

    /**
     * Sign in a Statamic user as admin.
     *
     * @return mixed
     */
    protected function signInAdmin()
    {
        $user = User::make();
        $user->id(1)->email('test@mail.de')->makeSuper();
        $this->be($user);

        return $user;
    }
}
