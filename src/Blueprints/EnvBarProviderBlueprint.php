<?php

namespace Plugrbase\EnvBar\Blueprints;

use Statamic\Facades\Blueprint;

class EnvBarProviderBlueprint
{
    public function __invoke()
    {
        return Blueprint::make()->setContents([
            'sections' => [
                'Local' => [
                    'fields' => [
                        [
                            'handle' => 'envbar_local_enabled',
                            'field' => [
                                'type' => 'toggle',
                                'display' => 'Local Enabled',
                            ],
                        ],
                        [
                            'handle' => 'envbar_local_message',
                            'field'  => [
                                'type' => 'textarea',
                                'display' => 'Message',
                                'instructions'  => 'The message to display in the environment bar',
                            ],
                        ],
                    ],
                ],
                'Development' => [
                    'fields' => [
                        [
                            'handle' => 'envbar_development_enabled',
                            'field' => [
                                'type' => 'toggle',
                                'display' => 'Development Enabled',
                            ],
                        ],
                        [
                            'handle' => 'envbar_development_message',
                            'field'  => [
                                'type' => 'textarea',
                                'display' => 'Message',
                                'instructions'  => 'The message to display in the environment bar',
                            ],
                        ],
                    ],
                ],
                'Staging' => [
                    'fields' => [
                        [
                            'handle' => 'envbar_staging_enabled',
                            'field' => [
                                'type' => 'toggle',
                                'display' => 'Staging Enabled',
                            ],
                        ],
                        [
                            'handle' => 'envbar_staging_message',
                            'field'  => [
                                'type' => 'textarea',
                                'display' => 'Message',
                                'instructions'  => 'The message to display in the environment bar',
                            ],
                        ],
                    ],
                ],
                'Production' => [
                    'fields' => [
                        [
                            'handle' => 'envbar_production_enabled',
                            'field' => [
                                'type' => 'toggle',
                                'display' => 'Production Enabled',
                            ],
                        ],
                        [
                            'handle' => 'envbar_production_message',
                            'field'  => [
                                'type' => 'textarea',
                                'display' => 'Message',
                                'instructions'  => 'The message to display in the environment bar',
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }
}
