"use strict";

var gulp = require('gulp');
var stylus = require('gulp-stylus');
var nib = require('nib');
var gulpif = require('gulp-if');
var sprite = require('css-sprite').stream;

// stylus
gulp.task('nib', function(){
    gulp.src('styl/style.styl')
        .pipe(stylus({ use: nib(), compress: false }))
        .pipe(gulp.dest('/'));
});

// generate sprite.png and _sprite.styl
gulp.task('sprites', function () {
  return gulp.src('img/sprite/*.png')
    .pipe(sprite({
      name: 'sprite',
      style: 'sprite.styl',
      cssPath: '../img/',
      processor: 'stylus',
      image: 'img/sprite.png'
    }))
    .pipe(gulpif('*.png', gulp.dest('img/'), gulp.dest('styl/')))
});

// watch
gulp.task('watch', function() {
	gulp.watch('styl/*.styl', ['nib'])
});

// default
gulp.task('default', ['nib', 'sprites', 'watch']);