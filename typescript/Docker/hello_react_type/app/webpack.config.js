const HtmlWebPackPlugin = require("html-webpack-plugin");
const path = require('path')
const outputPath = path.resolve(__dirname, 'public');

module.exports = {
    mode: 'development',//webpack4以降はモード指定しなければいけない
    devtool: 'source-map',
    entry: {
        'login/Login': './src/login/Login.tsx',
        'client/Client': './src/client/Client.tsx',
        // 'server/Server': './src/server/Server.tsx',
    },
    output: {
        path: outputPath,
        filename: '[name].js',
    },
    module: {
        rules: [
            {
                test: /\.tsx$/,
                exclude: /node_modules/,
                loader: "ts-loader",
                //loader: 'babel-loader',
                // query: {
                //     babelrc: false,
                //     presets: [
                //         '@babel/preset-env',
                //         '@babel/preset-react'
                //     ],
                //     plugins: [
                //         ['@babel/plugin-proposal-decorators', {
                //             legacy: true
                //         }],
                //         ['@babel/plugin-proposal-class-properties', {
                //             loose: true
                //         }]
                //     ]
                // }
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
    resolve: {
        extensions: ['.ts', '.tsx', '.js']
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