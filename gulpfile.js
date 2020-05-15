var gulp = require('gulp');
gulp.task('hello', function (cb) {
    console.log('First Task');
    cb();
})

gulp.task('promise', function (cb) {
    return new Promise(function (resolve, reject) {
        setTimeout(function () {
            resolve();
        }, 300);
    });
});

gulp.task('default', function (cb) {
    console.log('Default Task');
    cb();
});
