<!-- statamic:hide -->
![GitHub release (latest by date)](https://img.shields.io/github/v/release/plugrbase/statamic-environment-bar?style=flat-square)
![Statamic 3.0+](https://img.shields.io/badge/Statamic-3.0+-FF269E?style=flat-square&link=https://statamic.com)

# Statamic Environment Bar

<!-- /statamic:hide -->

This addons adds an environment bar to the control panel so thet you know what environment you're woking. You can change the colors, texts ann enable / disable the bar per environment. 

# Installation

You can search for this addon in the `Tools > Addons` section of the Statamic control panel and click **install**, or run the following command from your project root:

```bash
composer require plugrbase/statamic-environment-bar
```

Optionally publish the config file of this package:

```bash
php artisan vendor:publish --provider="Plugrbase\EnvBar\ServiceProvider"
```

# Control Panel

Once installed, you can access the settings in the control panel by clicking the "EnvBar" button.

![settings](./docs/settings-form.png)

## Official Support

If you're in need of some help, drop an email to [hello@plugrbase.com](mailto:hello@plugrbase.com)!

# License

This addon is a commercial addon - you **must purchase a license** via the [Statamic Marketplace](https://statamic.com/addons/double-three-digital/simple-commerce) to use it in a production environment.
