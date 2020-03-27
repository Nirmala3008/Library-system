const mix = require('laravel-mix');
require('laravel-mix-alias');

mix.options({
    postCss: [
        require('autoprefixer'),
    ],
});

mix.alias({
    'ProjectComponents': 'resources',
    'NitsModels': 'vendor/nitseditor/framework/src/Frontend/Admin/models',
    'NitsTheme': 'vendor/nitseditor/framework/src/Frontend/Admin/theme',
    'NitsComponents': 'vendor/nitseditor/framework/src/Frontend/Admin/components',
    'NitsAdmin': 'vendor/nitseditor/framework/src/Frontend/Admin',
});

mix.webpackConfig({
    node: {
        fs: "empty"
    },
    output: {
        publicPath: '/',
        chunkFilename: 'nits-assets/chunks/[name].[chunkhash].js',
    }
});

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('vendor/nitseditor/framework/src/Frontend/Admin/layout-one.js', 'public/nits-assets/js/admin')
    .js('vendor/nitseditor/framework/src/Frontend/Admin/layout-two.js', 'public/nits-assets/js/admin')
    .js('vendor/nitseditor/framework/src/Frontend/Admin/layout-three.js', 'public/nits-assets/js/admin')
    .sourceMaps()
    .version();
