let mix = require("laravel-mix");

mix.js("resources/js/cp.js", "dist/js").vue();

mix.sass('resources/sass/cp.scss', 'dist/css', {
    implementation: require('sass')
});  