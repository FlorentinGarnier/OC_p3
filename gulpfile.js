'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');

const SOURCE_PATH = './src'

gulp.task('sass', function () {
    return gulp.src('./src/Front/Ressource/scss/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./web/assets/css'));
});

gulp.task('sass:watch', function () {
    gulp.watch('./src/ViewInterface/scss', ['sass']);
});