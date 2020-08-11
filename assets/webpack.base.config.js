const path = require( 'path' );
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const webpack = require('webpack');

module.exports = {
    entry: {
        common: './src/js/app_common.js',
        top: './src/js/app_top.js',
        menu: './src/js/app_menu.js',
        guide: './src/js/app_guide.js',
    },
    output: {
        filename: '[name].bundle.js',
        path: path.resolve( __dirname, '../js' )
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                include: path.resolve( __dirname, 'src/js' ),
                use: [
                    {
                        loader: 'babel-loader',
                        options: {
                            presets: [
                                [
                                    '@babel/env',
                                    {
                                        targets: {
                                            ie: '11'
                                        },
                                        useBuiltIns: 'usage',
                                        corejs: 3,
                                        debug: true
                                    }
                                ]
                            ]
                        }
                    }
                ]
            },
            {
                test: /\.scss$/,
                include: path.resolve( __dirname, 'src/sass' ),
                use: [
                    MiniCssExtractPlugin.loader,
                    {
                        loader: 'css-loader',
                        options: {
                            url: false
                        }
                    },
                    {
                        loader: 'postcss-loader',
                        options: {
                          plugins: [
                            require( 'autoprefixer' )({grid: 'autoplace'})
                          ]
                        }
                    },
                    'sass-loader',
                    'import-glob-loader'
                ]
            }
        ]
    },
    plugins: [
        new MiniCssExtractPlugin({
          filename: '../assets/public/style.css',
          ignoreOrder: true
        }),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            'window.jQuery': 'jquery'
        }),
      ]
};
