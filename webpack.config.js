var path = require('path');
var webpack = require('webpack');
var node_modules_dir = path.join(__dirname, 'node_modules');

var config = {
    entry: {
        "searchBird": [
            'webpack-dev-server/client?http://127.0.0.1:3000',
            'webpack/hot/only-dev-server',
            './web/react/app.react.js',
        ],
        "addBird": [
            './web/react/add.react.js']
    },
    output: {
        path: path.join(__dirname, 'web/dist'),
        filename: '[name].js',
        publicPath: 'http://127.0.0.1:3000/static/'
    },
    plugins: [
        new webpack.HotModuleReplacementPlugin(),
        new webpack.NoErrorsPlugin(),
        new webpack.ProvidePlugin({
            "React": "react",
        }),
    ],
    module: {
        loaders: [
            {
                test: /\.(jpe?g|png|gif|svg)$/i,
                include: path.join(__dirname, 'web/uploads/images')
            },
            {
                test: /\.jsx?$/,
                include: path.join(__dirname, 'web/react'),
                loaders: ['react-hot', 'babel?presets[]=es2015,presets[]=stage-0,presets[]=react,plugins[]=transform-runtime'],
            }
        ]
    }
};

module.exports = config;