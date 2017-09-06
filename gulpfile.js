const gulp    = require('gulp');
const sass    = require('gulp-sass');
const webPack = require('webpack-stream');
const rename  = require('gulp-rename');

const stylesDirectory  = 'resources/assets/sass/';
const scriptsDirectory = 'resources/assets/js/';

gulp.task('css', () => {


    let styles = {
        "admin.css": stylesDirectory + "admin/admin.scss",
        "login.css": stylesDirectory + "login/main.scss",
        "site.css": stylesDirectory  + "site/main.scss"
    };

    for (let style in styles) {
        gulp.src(styles[style])
            .pipe(sass({ outputStyle: "compressed" }))
            .pipe(rename(style))
            .pipe(gulp.dest('public/css'));
    }
});

gulp.task('js', () => {
    let scripts = {
        "site.js": [
            scriptsDirectory + "/site/app.js"
        ],
        "admin.js": [
            scriptsDirectory + "/admin/main.js"
        ]
    };

    for (let script in scripts) {
        gulp.src(scripts[script])
            .pipe(webPack())
            .pipe(rename(script))
            .pipe(gulp.dest('public/js'));
    }
});

gulp.task('default', ["css", "js"]);
