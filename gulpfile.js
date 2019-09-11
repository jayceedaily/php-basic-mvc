const gulp = require('gulp');

const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const minCss = require('gulp-minify-css');
const rename = require('gulp-rename');

const uglify = require('gulp-uglify-es').default;
const concat = require('gulp-concat-util');
/*
    -- TOP LEVEL FUNCTIONS --
    gulp.task - Define tasks
    gulp.src - point to files to use
    gulp.dest - Points to folder to output
    gulp.watch - watch files and folders for changes
*/


/* ==================================================
  Task: Sass
 ================================================== */

gulp.task('sass', function(){
    return gulp.src('./resources/assets/scss/main.sass')

        // Output non-minified CSS file
        .pipe(sass({
            outputStyle:'expanded'
        }).on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(rename({ 
            prefix: 'ui-',
            basename: 'supply', 
            extname: '.css'
        }))
        .pipe(gulp.dest('./public/lib/uisupply/css/'))

        // Output the minified version
        .pipe(minCss())
        .pipe(rename({
            prefix: 'ui-', 
            basename: 'supply', 
            extname: '.min.css' 
        }))
        .pipe(gulp.dest('./public/lib/uisupply/css'))
});



/* ==================================================
  Task: sass-pages
 ================================================== */
gulp.task('sass-pages', function(){
    return gulp.src('./resources/assets/scss/pages/*.sass')

        // Output non-minified CSS file
        .pipe(sass({
            outputStyle:'expanded'
        }).on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(rename({ 
            prefix: 'gmi-',
            extname: '.css'
        }))
        .pipe(gulp.dest('./public/css/pages/'))

        // Output the minified version
        .pipe(minCss())
        .pipe(rename({
            extname: '.min.css' 
        }))
        .pipe(gulp.dest('./public/css/pages/'))
});



/* ==================================================
  Task: js
 ================================================== */

gulp.task('js', function() {
    gulp.src('./resources/assets/js/*.js')

        // Output non-minified version
        .pipe(concat('ui-supply.js'))
        .pipe(concat.header('var UIsupply = function(){\n'))
        .pipe(concat.footer('\n} \n\nvar UIs = new UIsupply();'))
        .pipe(gulp.dest('./public/lib/uisupply/js/'))

        // Output minified version
        .pipe(uglify())
        .pipe(rename({
            extname: '.min.js' }))
        .pipe(gulp.dest('./public/lib/uisupply/js/'))
});


/* ==================================================
  Task: watch
 ================================================== */

gulp.task('watch', () => {
    gulp.watch('./resources/assets/scss/**/*.sass', ['sass']);
    gulp.watch('./resources/assets/scss/pages/*.sass', ['sass-pages']);
    gulp.watch('./resources/assets/js/*.js', ['js']);
}); 