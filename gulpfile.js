var gulp = require('gulp');
var sass = require('gulp-sass');
var babel = require('gulp-babel');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var postcss = require('gulp-postcss');
var cssnano = require('gulp-cssnano');
var autoprefixer = require('autoprefixer');
var header = require('gulp-header');
var pkg = require('./package.json');

const banner = [
  '/**',
  ' * <%= pkg.description %>',
  ' *',
  ' * @version <%= pkg.version %>',
  ' * @link <%= pkg.homepage %>',
  ' * @license Released under the <%= pkg.license %> license.',
  ' */',
  ''].join('\n');

gulp.task('sass', function () {
  return gulp.src('./src/sass/*.scss')
    .pipe(sass({
      includePaths: ['./node_modules']
    }).on('error', sass.logError))
    .pipe(postcss([autoprefixer()]))
    .pipe(cssnano({ discardComments: { removeAll: true } }))
    .pipe(concat('theme.min.css'))
    .pipe(header(banner, { pkg: pkg }))
    .pipe(gulp.dest('./assets/css'));
});

gulp.task('scripts', function () {
  return gulp.src([
      './node_modules/bootstrap/dist/js/bootstrap.js',
      './src/js/*.js',
    ])
    .pipe(babel({
      presets: ['@babel/preset-env']
    }))
    .pipe(uglify())
    .pipe(concat('theme.min.js'))
    .pipe(header(banner, { pkg: pkg }))
    .pipe(gulp.dest('./assets/js'));
});

gulp.task('copy-assets', function (done) {
  gulp.src('./node_modules/@fortawesome/fontawesome-free/webfonts/**/*.{ttf,woff,woff2,eot,svg}')
    .pipe(gulp.dest('./assets/webfonts'));

  done();
});

gulp.task('watch', function () {
  gulp.watch('./src/sass/**/*.scss', gulp.series('sass'));
  gulp.watch('./src/js/**/*.js', gulp.series('scripts'));
});
