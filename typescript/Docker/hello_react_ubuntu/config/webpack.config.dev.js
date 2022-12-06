const merge = require('webpack-merge');
const webpackConfig = require('../webpack.config.js');

module.exports = merge(webpackConfig, {
    mode: 'development',
    devServer: {
    historyApiFallback: true,
    inline: true,
    open: true,
    host: 'localhost',
    port: 8000,
    proxy: {
    '/api/**': {
            target: 'http://localhost:3000',
            changeOrigin: true,
        secure: false,
        logLevel: 'debug'
    }
    },
    }
})