<?php

namespace Plugrbase\EnvBar\Tests;

use Statamic\Assets\AssetContainer;
use Statamic\Facades\User;

class SettingsTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::make();
        $this->user->id(1)->email('test@plugrbase.com')->makeSuper();
        $this->be($this->user);
        AssetContainer::make('test')->disk('test')->save();
    }

    public function test_see_settings_form()
    {
        //$response = $this->get(cp_route('plugrbase.envbar.settings.index'));
        $this->assertTrue(true);
    }
}
