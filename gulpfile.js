const gulp = require('gulp');
const browserSync = require('browser-sync').create();

// Task to reload browser
function reload(done) {
  browserSync.reload();
  done();
}

// Task to serve with BrowserSync
function serve(done) {
  browserSync.init({
    proxy: "http://esbjerg-board-games.local/", // Your LOCAL WordPress URL
    files: ['**/*.php', '**/*.css', '**/*.js'], // Files to watch
    injectChanges: true, // Inject CSS changes without full reload
    notify: false, // Disable notifications
    port: 3001, // Use a different port if 3000 is in use
  });
  done();
}

// Watch files for changes
function watchFiles() {
  gulp.watch("**/*.php", reload); // Watch for PHP changes
  gulp.watch("**/*.css").on('change', browserSync.reload); // Inject CSS changes
  gulp.watch("**/*.js", reload);  // Watch for JS changes
}

// Default task
const dev = gulp.series(serve, watchFiles);

exports.default = dev;
