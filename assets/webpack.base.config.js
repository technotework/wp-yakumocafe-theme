const path = require( 'path' );
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );

module.exports = {
    entry: {
        index: './src/js/app.js'
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
                    'css-loader',
                    {
                        loader: 'postcss-loader',
                        options: {
                          plugins: [
                            require( 'autoprefixer' )({grid: true})
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
        })
      ]
};
