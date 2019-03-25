const mix_ = require('laravel-mix');


mix_.setPublicPath('./dist/')
	.js('./assets/scripts/main.js', 'js/scripts.min.js')
	.sass('./assets/styles/main.scss', 'css/main.min.css')
  .css('./assets/styles/patch.css', 'css/main.min.css');


if (mix_.inProduction()) {
	mix_.version();
} else {
	mix_.sourceMaps();
}
