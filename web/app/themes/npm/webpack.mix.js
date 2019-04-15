const mix_ = require('laravel-mix');


mix_.setPublicPath('./dist')
    .js(['assets/scripts/jquery.flexslider.js', './assets/scripts/main.js'], 'js/main.min.js')
    .less('assets/styles/main.less', 'css/main.min.css')
    .styles('assets/styles/old-ie.css', 'dist/css/old-ie.css');


if (mix_.inProduction()) {
    mix_.version();
} else {
    mix_.sourceMaps();
}
