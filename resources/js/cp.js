
/**
 * When extending the control panel, be sure to uncomment the necessary code for your build process:
 * https://statamic.dev/extending/control-panel
 */

import EnvBar from './components/EnvBar.vue'

Statamic.booting(() => {
    if (Statamic.$config.get('plugrbase_env_bar_enabled')) {
        Statamic.$components.register('env-bar', EnvBar);
    }
})

Statamic.booted(() => {
    if (Statamic.$config.get('plugrbase_env_bar_enabled')) {
        const component = Statamic.$root.$components.append('env-bar', {
            props: {
                message: Statamic.$config.get('plugrbase_env_bar_message')
            }
        });
    }
})
