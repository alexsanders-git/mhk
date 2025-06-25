const mix = require('laravel-mix');

mix.webpackConfig({
    stats: {
        children: true
    }
});

// JavaScript
mix.js('assets/js/scripts/*.js', 'assets/js/as-scripts.js');

// SCSS
mix.options({
    processCssUrls: false,
    postCss: [
        require('autoprefixer'),
        require('postcss-sort-media-queries')
    ],
})

mix.sass('assets/scss/as-style.scss', 'assets/css')
    .sourceMaps();

mix.sass('assets/scss/as-admin-style.scss', 'assets/css')
    .sourceMaps();


// ACF Blocks
mix.sass('template-parts/acf-blocks/gallery/style.scss', 'template-parts/acf-blocks/gallery')
    .sourceMaps();

mix.sass('template-parts/acf-blocks/reviews/style.scss', 'template-parts/acf-blocks/reviews')
    .sourceMaps();