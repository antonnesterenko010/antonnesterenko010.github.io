const {src, dest, watch, parallel, series} = require('gulp'),
    scss = require('gulp-sass')(require('sass')),
    gcmq = require('gulp-group-css-media-queries'),
    cleanCSS = require('gulp-clean-css'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    terser = require('gulp-terser'),
    babel = require('gulp-babel'),
    browserSync = require('browser-sync').create(),
    autoprefixer = require('gulp-autoprefixer'),
    sourcemaps = require('gulp-sourcemaps'),
    del = require('del');

function styles()
{
    return src(['../assets/scss/app.scss'])
        .pipe(sourcemaps.init())
        .pipe(scss({outputStyle: 'expanded'}))
        .pipe(gcmq())
        .pipe(autoprefixer(['last 2 versions']))
        .pipe(cleanCSS())
        .pipe(sourcemaps.write())
        .pipe(rename({suffix: '.min'}))
        .pipe(dest('../dest/css/'))
        .pipe(browserSync.stream())
}

function scripts() {
    return src(['../assets/js/app.js', '../assets/js/slider.js'])
        .pipe(sourcemaps.init())
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(terser())
        .pipe(sourcemaps.write())
        .pipe(dest('../dest/js')) // Збережіть мініфіковані файли у dest/js без об'єднання
        .pipe(rename(function(path) {
            path.basename += ".min"; // Додайте .min до імені файлу
        }))
        .pipe(dest('../dest/js')) // Збережіть файли з .min в dest/js
        .pipe(browserSync.stream());
}


function clean()
{
    return del(['../dest/css'], {force: true})
}

function watcher()
{
    watch(['../assets/scss/**/*.scss'], series(clean, styles))
    watch(['../assets/js/*.js'], scripts)
}

function server()
{
    browserSync.init({
        proxy: "samplewptheme.loc"
    });
}

exports.styles = styles;
exports.scripts = scripts;
exports.watcher = watcher;
exports.server = server;
exports.build = series(styles, scripts);

exports.default = series(
    parallel(styles, scripts),
    parallel(watcher, server)
);