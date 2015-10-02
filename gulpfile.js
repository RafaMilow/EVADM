var gulp = require('gulp');
var minifyCss = require('gulp-minify-css');
var rename = require("gulp-rename");
var uglify = require('gulp-uglify');
var sourcemaps = require('gulp-sourcemaps');
var sass = require('gulp-sass');
var concat = require('gulp-concat');

gulp.task('scss', function() {
    gulp.src('./scss/*.scss')
      .pipe(sourcemaps.init())
      .pipe(sass({
        includePaths: ['bower_components/foundation/scss']
      }))
      .pipe(sourcemaps.write('.'))
      .pipe(gulp.dest('./css/src'));
});

gulp.task('css', function() {
    gulp.src('css/src/*.css')
      .pipe(sourcemaps.init())
      .pipe(minifyCss())
      .pipe(rename(function (path) {
      path.basename += ".min"
      }))
      .pipe(sourcemaps.write('.'))
      .pipe(gulp.dest('./css/min/'));
});



gulp.task('default', ['scss', 'css']);