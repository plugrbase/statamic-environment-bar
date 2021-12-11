<?php

namespace Plugrbase\EnvBar\Http\Controllers;

use Illuminate\Http\Request;
use Plugrbase\EnvBar\Blueprints\EnvBarProviderBlueprint;
use Statamic\Http\Controllers\CP\CpController;
use Statamic\Facades\File;
use Statamic\Facades\YAML;

class EnvBarController extends CpController
{
    protected $path;

    public function __construct(Request $request)
    {
        parent::__construct($request);

        $this->path = config('statamic.plugrbase_env_bar.path');
    }

    public function index()
    {
        $blueprint = new EnvBarProviderBlueprint();
        $fields = $blueprint()->fields()->preProcess();
        $values = file_exists($this->path) ? YAML::file($this->path)->parse() : $fields->values();

        return view('statamic-environment-bar::cp.settings.index', [
            'blueprint' => $blueprint()->toPublishArray(),
            'values'    => $values,
            'meta'      => $fields->meta(),
        ]);
    }

    public function update(Request $request)
    {
        $blueprint = new EnvBarProviderBlueprint();
        $fields = $blueprint()->fields()->addValues($request->all());
        $fields->validate();
        File::put($this->path, YAML::dump($fields->process()->values()->all()));
    }
}
