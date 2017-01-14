var gulp = require('gulp');
var babel = require('gulp-babel');
var sass = require('gulp-sass');
var livereload = require('gulp-livereload');
var uglify = require('gulp-uglify');
var minifyCSS = require('gulp-minify-css');
var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var sourcemaps = require('gulp-sourcemaps');
var zip = require('gulp-zip');

// run 'gulp sass' to compile sass to css
gulp.task('sass', function() {
  var one = gulp.src('scss/style.scss')
    .pipe(sass())
    .pipe(autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false,
    }))
    .pipe(sourcemaps.init())
    .pipe(minifyCSS({
      keepBreaks: false,
      keepSpecialComments: 1,
    }))
    .pipe(sourcemaps.write('./sourcemaps'))
    .pipe(gulp.dest('../'));
});

// run 'gulp jsConcat' to compile javaScript
gulp.task('jsConcat', function() {
  gulp.src(['js/*.js'])
    .pipe(concat('scripts.js'))
    .pipe(babel())
    .pipe(gulp.dest('../js'));
});

// 'gulp watch' to watch the scss folder
// reload the browser on changes
// https://chrome.google.com/webstore/detail/livereload/jnihajbhpnppcggbcgedagnkighmdlei
gulp.task('watch', function() {
  var watcher = gulp.watch(['scss/**/*.scss', 'js/*.js', '../**/*.php'], ['sass', 'jsConcat']);
  livereload.listen();
  watcher.on('change', function(event) {
    console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
    livereload.changed();
  });
});

// 'gulp package' to build zip file for upload
gulp.task('package', function() {
  gulp.src(['../**/*.*', '!../_build/**'])
  .pipe(zip('indvatx.zip'))
  .pipe(gulp.dest('../../'));
});
