// import external dependencies
import 'jquery';

// Import everything from autoload
// import './autoload/**/*';

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import buildPage from './routes/build';
import single from './routes/single';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Build page
  buildPage,
  // Single Page
  single,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
