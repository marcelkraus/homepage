var gulp = require('gulp');
var less = require('gulp-less');
var minifyCss = require('gulp-minify-css');
var rename = require('gulp-rename');

gulp.task('less', function() {
    return gulp.src('./src/Resources/less/app.less')
        .pipe(less())
        .pipe(minifyCss({compatibility: 'ie8'}))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('./web/css'));
});

gulp.task('watch', function() {
    gulp.watch('./src/Resources/less/**/*.less', ['less']);
});

gulp.task('default', ['less', 'watch']);
