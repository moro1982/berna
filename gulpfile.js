/** Nueva version de Gulp **/

import path from 'path';
import fs from 'fs';
import { glob } from 'glob';
import { src, dest, watch, series } from 'gulp';
import * as dartSass from 'sass';
import gulpSass from 'gulp-sass';
const sass = gulpSass(dartSass);
import terser from 'gulp-terser';
import sharp from 'sharp';

/* Workflow de CSS */
export function css( done ) {
    src( 'src/scss/app.scss', { sourcemaps: true } )
        .pipe( sass({
            outputStyle : 'compressed'
        }).on('error', sass.logError) )
        .pipe( dest('./public/build/css'), { sourcemaps: '.' } )
    done();
}

/* Workflow de JS*/
export function js( done ) {
    src( 'src/js/app.js', { sourcemaps: true } )
        .pipe( terser() )
        .pipe( dest('./public/build/js', { sourcemaps: '.' }) );
    done();
}

/* Workflow de Imágenes */
export async function imagenes(done) {
    const srcDir = './src/img';
    const buildDir = './public/build/img';
    const images =  await glob('./src/img/**/*{jpg,png}');

    images.forEach(file => {
        const relativePath = path.relative(srcDir, path.dirname(file));
        const outputSubDir = path.join(buildDir, relativePath);
        procesarImagenes(file, outputSubDir);
    });
    done();
}
function procesarImagenes(file, outputSubDir) {
    if (!fs.existsSync(outputSubDir)) {
        fs.mkdirSync(outputSubDir, { recursive: true })
    }

    const baseName = path.basename(file, path.extname(file));
    const extName = path.extname(file);
    const outputFile = path.join(outputSubDir, `${baseName}${extName}`);

    if (extName == ".jpg") {
        const outputFileWebp = path.join(outputSubDir, `${baseName}.webp`);
        const outputFileAvif = path.join(outputSubDir, `${baseName}.avif`);
        const options = { quality: 80 };
        sharp(file).jpeg(options).toFile(outputFile);
        sharp(file).webp(options).toFile(outputFileWebp);
        sharp(file).avif().toFile(outputFileAvif);
    }
    if (extName == ".png") {
        sharp(file).png().toFile(outputFile);
    }
}

/* Watch */
export function dev(done) {
    watch('src/scss/**/*.scss', css);
    watch('src/js/**/*.js', js);
    watch('src/img/**/*.{jpg,png}', imagenes);
}

export default series(js, css, imagenes, dev);
// export default series(js, css, dev);
// export default series(js, css, imagenes);

///////////////////////////////////////////////////////////////////////////////////////////////////

/** Version antigua de Gulp **/

/*

const webp = require('gulp-webp');
const cache = require('gulp-cache');
const imagemin = require('gulp-imagemin');
const avif = require('gulp-avif');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const postcss = require('gulp-postcss');
const terser = require('gulp-terser-js');

function versionWebp( done ) {
    const options = {
        quality: 50
    };
    src('src/img/**//*.{png,jpg}')
        .pipe( webp(options) )
        .pipe( dest('build/img') )
    done();
}
function versionAvif( done ) {
    const options = {
        quality: 50
    };
    src('src/img/**//*.{png,jpg}')
        .pipe( avif(options) )
        .pipe( dest('build/img') )
    done();
}
function imagenes( done ) {
    const options = {
        optimizationLevel: 3
    }
    src('src/img/**//*.{png,jpg}')
        .pipe( cache( imagemin(options) ) )
        .pipe( dest('build/img') )
    done();
}

const _css = css;
export { _css as css };
const _dev = dev;
export { _dev as dev };
const _javascript = javascript;
export { _javascript as javascript };
const _versionWebp = versionWebp;
export { _versionWebp as versionWebp };
const _versionAvif = versionAvif;
export { _versionAvif as versionAvif };
const _imagenes = imagenes;
export { _imagenes as imagenes };
const _dev = parallel(imagenes, versionWebp, versionAvif, javascript, dev);
export { _dev as dev };

*/