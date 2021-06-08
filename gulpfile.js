const fs = require("fs");
const path = require("path");
const mergeStream = require("merge-stream");
const gulp = require("gulp");
const { src, dest, series, parallel } = require("gulp");
const compiler = require("webpack");
const webpack = require("webpack-stream");
const uglify = require("gulp-uglify");
const rename = require("gulp-rename");
const concat = require("gulp-concat");
const sass = require("gulp-sass");
const cssnano = require("gulp-cssnano");
const autoprefixer = require("gulp-autoprefixer");
const sourcemaps = require("gulp-sourcemaps");
const gulpif = require("gulp-if");
const bs = require("browser-sync");

const globalSrc = path.join(__dirname, "global/src");
const globalDist = path.join(__dirname, "global/dist");
const componentSrc = path.join(__dirname, "components/src");
const componentDist = path.join(__dirname, "components/dist");

const env = process.env.NODE_ENV || "development";

const isDevelopment = env === "development";

const filesToWatch = [
    "global/src/css/**/*.scss",
    "global/src/js/**/*.js",
    "components/src/**/*.scss",
    "components/src/**/*.js",
];

const allFilesForReload = [
    "global/src/**/*.scss",
    "global/src/**/*.js",
    "components/src/**/*.scss",
    "components/src/**/*.js",
    "*.php",
    "**/*.php",
    "**/**/*.php",
    "components/src/**/*.php",
];

const getFolders = (dir) =>
    fs
        .readdirSync(dir)
        .filter((file) => fs.statSync(path.join(dir, file)).isDirectory());

const ComponentJSTranspile = () =>
    mergeStream(
        ...getFolders(componentSrc).map((folder) =>
            src(path.join(componentSrc, folder, "*.js"))
                .pipe(gulpif(isDevelopment, sourcemaps.init()))
                .pipe(concat(folder + ".js"))
                .pipe(gulpif(!isDevelopment, uglify()))
                .pipe(rename({ extname: ".min.js" }))
                .pipe(gulpif(isDevelopment, sourcemaps.write(".")))
                .pipe(dest(path.join(componentDist, folder)))
        )
    );

const GlobalJSTranspile = () =>
    src(path.join(globalSrc, "/js", "global.js"))
        .pipe(gulpif(isDevelopment, sourcemaps.init()))
        .pipe(concat("global.js"))
        .pipe(gulpif(!isDevelopment, uglify()))
        .pipe(rename({ extname: ".min.js" }))
        .pipe(gulpif(isDevelopment, sourcemaps.write(".")))
        .pipe(dest(path.join(globalDist)));

const GlobalSCSSTranspile = () =>
    src(path.join(globalSrc, "/css", "styles.scss"))
        .pipe(gulpif(isDevelopment, sourcemaps.init()))
        .pipe(sass())
        .pipe(concat("styles.css"))
        .pipe(autoprefixer())
        .pipe(gulpif(!isDevelopment, cssnano()))
        .pipe(gulpif(isDevelopment, sourcemaps.write(".")))
        .pipe(dest(path.join(globalDist)));

const ComponentSCSSTranspile = () =>
    mergeStream(
        ...getFolders(componentSrc).map((folder) =>
            src(path.join(componentSrc, folder, "*.scss"))
                .pipe(gulpif(isDevelopment, sourcemaps.init()))
                .pipe(sass())
                .pipe(concat(folder + ".css"))
                .pipe(autoprefixer())
                .pipe(gulpif(!isDevelopment, cssnano()))
                .pipe(gulpif(isDevelopment, sourcemaps.write(".")))
                .pipe(dest(path.join(componentDist, folder)))
        )
    );

const browserSync = () => {
    return bs.init({
        proxy: "http://localhost:8080",
        files: allFilesForReload,
        injectChanges: true,
    });
};

const build = parallel(
    GlobalSCSSTranspile,
    GlobalJSTranspile,
    ComponentJSTranspile,
    ComponentSCSSTranspile
);

const watch = series(function watchFiles() {
    browserSync();
    return gulp.watch(filesToWatch, build);
});

exports.build = build;
exports.default = build;
exports.watch = watch;
exports.bs = browserSync;
