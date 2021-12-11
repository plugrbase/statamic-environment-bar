<?php

namespace Plugrbase\EnvBar;

use Statamic\Facades\YAML;

class EnvBar
{
    /**
     * The message to display
     *
     * @var string
     */
    protected $message = 'You are currently working in the <strong>:environment</strong> environment.';

    /**
     * The background color
     *
     * @var string
     */
    protected $color = '';

    /**
     * The settings
     *
     * @var array|null
     */
    protected $settings = null;

    public function __construct()
    {
        $this->setSettings();
        $this->setColor();
        $this->setMessage();
    }

    public function setSettings()
    {
        $plugrbase_env_bar_settings = tap(YAML::file(config('statamic.plugrbase_env_bar.path'))->parse());
        
        if (isset($plugrbase_env_bar_settings->target)) {
            $this->settings = $plugrbase_env_bar_settings->target;
        }
    }

    public function getColor():String
    {
        return $this->color;
    }

    public function setColor()
    {
        $this->color = $this->getEnvironmentColor();

        if (!$this->isEnabled()) {
            return;
        }

        $environment = $this->getEnvironment();

        if (isset($this->settings['envbar_' . $environment . '_color'])) {
            $this->color = $this->settings['envbar_' . $environment . '_color'];
        }
    }

    public function getMessage():String
    {
        return $this->message;
    }

    public function setMessage()
    {
        $environment = $this->getEnvironment();
        $this->message = str_replace(':environment', $environment, $this->message);

        if (!$this->isEnabled()) {
            return;
        }

        if (isset($this->settings['envbar_' . $environment . '_message'])) {
            $this->message = $this->settings['envbar_' . $environment . '_message'];
        }
    }

    public function isEnabled()
    {
        if (!$this->settings) {
            return false;
        }

        $environment = $this->getEnvironment();

        if (!isset($this->settings['envbar_' . $environment . '_enabled']) || $this->settings['envbar_' . $environment . '_enabled'] == false) {
            return false;
        }

        return true;
    }

    protected function getEnvironment()
    {
        $environment = config('app.env');
        $envBarEnvironments = config('statamic.plugrbase_env_bar.environment');
        return isset($envBarEnvironments[$environment]) ? $envBarEnvironments[$environment] : '';
    }

    protected function getEnvironmentColor()
    {
        $environment = $this->getEnvironment();
        $envBarColors = config('statamic.plugrbase_env_bar.color');
        return isset($envBarColors[$environment]) ? $envBarColors[$environment] : '';
    }
}
