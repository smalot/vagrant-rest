var gulp = require('gulp');
var gulpLoadPlugins = require('gulp-load-plugins');
var path = require('path');

var browserSync = require('browser-sync').create();
var browserSyncConfig = require('./config/browsersync.json');

// Plugins Gulp
var plugins = gulpLoadPlugins();

// Répertoires
var rep = {
	css: 'web/css/',
	sass: 'web/sass/',
	pages: 'app_dev.php/'
};

// Fichiers
var files = {
	css: rep.css + '**/*.css',
	sass: rep.sass + '**/*.scss',
    sassCompile: rep.sass + 'compile.scss',
    pages: rep.pages + '*'
};

/**
 * Tâche : sass
 * Fonctions :
 * 		- Compilation SASS
 * 		- Préfixation des propriétés CSS3
 * 		- Compression CSS résultante
 *******************************************/
gulp.task('sass', function() {
	return gulp
		.src(files.sassCompile)
		.pipe(plugins.plumber({errorHandler: plugins.notify.onError("Error: <%= error.message %>") }))
		.pipe(plugins.sass({errLogToConsole: true}).on('error', plugins.sass.logError))
		.pipe(plugins.autoprefixer({browsers: ['last 2 versions', 'IE 9']}))
		.pipe(gulp.dest(rep.css))
		.pipe(plugins.rename({suffix: '.min'}))
		.pipe(plugins.cleanCss({compatibility: 'ie8'}))
		.pipe(gulp.dest(rep.css))
		.pipe(browserSync.stream());
});

/**
 * Tâche : browserSync
 * Fonctions :
 * 		- Synchronise tous les navigateurs et devices
 *******************************************/
gulp.task('browserSync', ['sass'], function() {
	browserSync.init(browserSyncConfig);

	// Compilation SASS
	gulp.watch(files.sass, ['sass']);

	// Reload des pages
	gulp.watch(files.pages).on('change', browserSync.reload);
});

/**
 * Tâche : default
 *******************************************/
gulp.task('default', ['browserSync']);
