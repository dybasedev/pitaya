/**
 * Created by chongyi on 16/7/3.
 */

var gulp = require('gulp');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var Elixir = require('laravel-elixir');

var Task = Elixir.Task;

Elixir.extend('uglify', function (src, target) {

    new Task('uglify', function () {
        return gulp.src(src)
                   .pipe(rename({suffix: '.min'}))
                   .pipe(uglify({
                       compress: true
                   })).pipe(gulp.dest(target));
    });

});