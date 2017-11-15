const
    gulp = require('gulp'), 
    stylus = require('gulp-stylus'),
    autoprefixer = require('gulp-autoprefixer'),
    sourcemaps = require('gulp-sourcemaps'),
    webpack = require('gulp-webpack'),
    src = {
        stylus: 'css/**/*.styl',
        css_input: './css/style.styl',
        css_output: 'dist/css',
        js_input: './js/script.js',
        js_output: 'dist/js',
        js_name: 'bundle.js',
        prefix: ['last 2 versions', 'Firefox > 20', '> 5%']
    };

gulp.task('stylus', function () {
  return gulp.src(src.css_input)
    .pipe(stylus({
      compress: true
    }))
    .pipe(autoprefixer({
        browsers: src.prefix, 
        cascade: false
    }))
    .pipe(gulp.dest(src.css_output));
});

gulp.task('js', function() {
    gulp.src(src.js_input)
        .pipe(webpack({
            output: {
                filename: src.js_name,
            }, 
            watch: true,
            module: {
                loaders: [{
                   
                    loader: 'babel-loader',
                    exclude: /node_modules/,
                    query: {
                        presets: ['es2015']
                    }
                }]
            },
        }))
        .pipe(sourcemaps.init())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(src.js_output)) 
});

gulp.task('watch', function() {
	gulp.watch([src.stylus, src.js_input], ['default']);
});


gulp.task('default', ['stylus', 'js']);
