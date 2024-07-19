const mix = require('laravel-mix');
const path = require('path');

mix.alias({
    '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
})

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .alias({
        'jquery': 'jquery'
    })
    .setPublicPath('public');
