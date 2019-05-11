const path = require('path');

module.exports = {
  publicPath: process.env.NODE_ENV === 'production'  // 'publicPath' replaces the deprecated 'baseUrl'
    ? '/radar' // asset url prefix in production mode
    : '/', // asset url prefix in development mode
  outputDir: '../' // running 'yarn build' will send production code to the root of the radar application
}
