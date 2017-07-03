var gulp = require('gulp');
var sass = require('gulp-sass');
var postcss = require('gulp-postcss');
var sourcemaps = require('gulp-sourcemaps');

var cssnano = require('cssnano');
var autoprefixer = require('autoprefixer');

gulp.task('compileSass', function() {

    var plugins = [
        autoprefixer({browsers: ['last 1 version']}),
        cssnano()
    ];

    gulp.src('assets/scss/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(sourcemaps.init())
        .pipe(postcss(plugins))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('assets/css'));

});

gulp.task('default', ['compileSass']);

gulp.task('watch', function() {
   gulp.watch('assets/scss/**/*.scss', ['compileSass']);
});