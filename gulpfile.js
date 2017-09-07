const gulp     = require('gulp');
const sass     = require('gulp-sass');
const webPack  = require('webpack-stream');
const rename   = require('gulp-rename');
const util     = require('gulp-util');
const manifest = require('./resources/assets/manifest.json');

gulp.task('css', () => {
    let outFile, inFiles;
    manifest.styles.build.forEach((style) => {
        outFile = style.out;
        inFiles = style.in.map((f) => { return manifest.styles.path + f; });

        let config = {};
        if (process.env.ENV === "production") {
            util.log("Production build, will compress the css files.");
            config.outputStyle = "compressed";
        }

        gulp.src(inFiles)
            .pipe(sass(config))
            .pipe(rename(outFile))
            .pipe(gulp.dest("public/css"));

        util.log("Built style '%s'.", outFile);
    });
});

gulp.task('js', () => {

    let outFile, inFiles;
    manifest.scripts.build.forEach((script) => {
        outFile = script.out;
        inFiles = script.in.map((f) => { return manifest.scripts.path + f; });

        gulp.src(inFiles)
            .pipe(webPack())
            .pipe(rename(script.out))
            .pipe(gulp.dest("public/js"));

        util.log("Built script '%s'.", outFile);
    });
});

gulp.task('default', ["css", "js"]);
