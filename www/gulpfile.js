'use strict';

var gulp = require('gulp'),
    sass = require('gulp-sass'),
    notify = require('gulp-notify')
;

const SOURCE_PATH = './web/scss/';
const STYLESHEET_DEST_PATH = './web/assets/css/';

gulp.task('sass', function () {
    return gulp.src(SOURCE_PATH + '/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest(STYLESHEET_DEST_PATH));
});

gulp.task('sass:watch', function () {
    gulp.watch(SOURCE_PATH, ['sass']);
});