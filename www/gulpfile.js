'use strict';

var gulp = require('gulp'),
    bower = require('gulp-bower'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    rename = require('gulp-rename'),
    minifycss = require('gulp-minify-css'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    gutil = require('gulp-util'),
    sourcemaps = require('gulp-sourcemaps'),
    size = require('gulp-filesize');


var config = {
    sassPath: './web/scss/',
    bowerDir: './bower_components',
    destPath: './web/assets/'
};

gulp.task('bower', function () {
    return bower()
        .pipe(gulp.dest(config.bowerDir))
});

gulp.task('icons', function () {
    return gulp.src(config.bowerDir + '/font-awesome/fonts/**.*')
        .pipe(gulp.dest(config.destPath + 'fonts/'));
});

gulp.task('sass', function () {
    return gulp.src(config.sassPath + '/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on("error", sass.logError))
        .pipe(autoprefixer('last 2 version'))
        .pipe(rename('main.css'))
        .pipe(minifycss())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(config.destPath + 'css/'))
        .on('end', function () {
            gutil.log(gutil.colors.yellow('♠ La tâche CSS est terminée.'));
        });
});

gulp.task('js', function () {
    return gulp.src([config.bowerDir + '/jquery/dist/jquery.js', config.bowerDir + '/bootstrap-sass/assets/javascripts/bootstrap.js', 'app/scripts/lib/*.js'])
        .pipe(uglify())
        .pipe(concat('main.js'))
        .pipe(gulp.dest(config.destPath + 'js/'))
        .pipe(size())
        .on('end', function () {
            gutil.log(gutil.colors.yellow('♠ La tâche JavaScript est terminée.'));
        });
});


gulp.task('sass:watch', function () {
    gulp.watch(config.sassPath + '/**/*.scss', ['sass']);
});

gulp.task('default', ['bower', 'icons', 'sass', 'js']);
