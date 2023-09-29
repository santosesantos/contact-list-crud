const { series, parallel } = require("gulp");
const gulp = require("gulp");
const sass = require("gulp-sass")(require("node-sass"));
const uglifyCss = require("gulp-uglifycss");
const concat = require("gulp-concat");
const uglify = require("gulp-uglify");
const babel = require("gulp-babel");

const processSass = () => {
	return gulp.src("src/assets/sass/index.scss")
		.pipe(sass().on("error", sass.logError))
		.pipe(uglifyCss({
			"uglyComments": true
		}))
		.pipe(concat("style.min.css"))
		.pipe(gulp.dest("build/assets/css"));
};

const processJS = callback => {
	gulp.src("src/assets/js/**/*.js")
		.pipe(babel({
			comments: false,
			presets: ["env"]
		}))
		.pipe(uglify())
		.pipe(concat("app.min.js"))
		.pipe(gulp.dest("build/assets/js"));

	return callback();
};

const copyPages = () => {
	return gulp.src("src/pages/**/*.php")
		.pipe(gulp.dest("build/pages"));
};

const copyIncludes = () => {
	return gulp.src("src/includes/**/*.php")
		.pipe(gulp.dest("build/includes"));
};

exports.default = parallel(
	processSass,
	processJS,
	copyPages,
	copyIncludes
);