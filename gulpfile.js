var gulp        = require('gulp');
var less   		= require('gulp-less');
var browserSync = require('browser-sync').create();
var LessAutoprefix = require('less-plugin-autoprefix');
var autoprefix = new LessAutoprefix({ browsers: ['last 2 versions'] });




/*// Static server
gulp.task('browser-sync', function() {
    browserSync.init({
        server: {
            baseDir: "./"
        }
    });
});*/

gulp.task('default');



gulp.task('default', function() {
    browserSync.init({
    	   

    	 server: {
    	 
    	 	
            proxy:"localhost:8082"
           
        }


       /* proxy: "//localhost:8082/StartWithGulpBowerNodejs"*/
    });
gulp.watch("./assets/bootstrap/less/cv.less",['checkMyLessFile']);
gulp.watch("./assets/**/*.less",['checkLessFile']);
gulp.watch("./**/*.js").on('change', browserSync.reload);
gulp.watch("./**/*.css").on('change', browserSync.reload);
gulp.watch("./**/*.php").on('change', browserSync.reload);
});


gulp.task('checkLessFile', function() {
return gulp.src('./assets/bootstrap/less/bootstrap.less')
  .pipe(less({
    plugins: [autoprefix]
  }))  
  .pipe(gulp.dest('./assets/css'));
});

gulp.task('checkMyLessFile', function() {
return gulp.src('./assets/bootstrap/less/toDo.less')
  .pipe(less({
    plugins: [autoprefix]
  }))  
  .pipe(gulp.dest('./assets/css'));
});

