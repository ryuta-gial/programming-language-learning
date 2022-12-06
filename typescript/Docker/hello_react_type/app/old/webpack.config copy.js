const HtmlWebPackPlugin = require("html-webpack-plugin");
const path = require('path')
const outputPath = path.resolve(__dirname, 'public');

module.exports = {
    mode: 'development',//webpack4以降はモード指定しなければいけない
    devtool: 'source-map',
    entry: {
        'api/Api':'./src/api/Auth.js',
        'login/Login': './src/login/Login.js',
        // 'client/Client': './src/client/Client.js',
    },
    output: {
        path: outputPath,
        filename: '[name].js',
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                loader: 'babel-loader',
                query: {
                    babelrc: false,
                    presets: [
                        '@babel/preset-env',
                        '@babel/preset-react'
                    ],
                    plugins: [
                        ['@babel/plugin-proposal-decorators', {
                            legacy: true
                        }],
                        ['@babel/plugin-proposal-class-properties', {
                            loose: true
                        }]
                    ]
                }
            },
            {
                test: /\.css$/i,
                use: ['style-loader', 'css-loader'],
            },
            {
                test: /\.scss$/,
                use: ['style-loader', 'css-loader', 'sass-loader']
            }
        ]
    },
    //webpack-dev-server用設定
    devServer: {
        //open: true,//ブラウザを自動で開く
        contentBase: outputPath,
        openPage: "./login/index.html",//自動で指定したページを開く
        host: 'localhost',
        port: 4000,
        watchContentBase: true,//コンテンツの変更監視をする
 // ポート番号
    },
    plugins: [
        // new HtmlWebPackPlugin({
        //     template: './src/client/input.html',
        //     filename: 'client/index.html',
        //    // filename: './input.html',
        //     chunks: [
        //         'client/Client'
        //     ]
        // }),
        new HtmlWebPackPlugin({
            template: './src/login/login.html',
            filename: 'login/index.html',
            chunks: [
                'login/Login',
            ]
        }),
        // new HtmlWebPackPlugin({
        //     template: './src/server/index.html',
        //     filename: 'server/index.html',
        //     chunks: [
        //         'server/Server',
        //     ]
        // }),
    ]
};