const CopyWebpackPlugin = require('copy-webpack-plugin');
const env = process.env.NODE_ENV === 'production' ? 'production' : 'development';
const Webpack = require('webpack');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const VueLoaderPlugin = require('vue-loader/lib/plugin');
const { ImageminWebpackPlugin } = require('imagemin-webpack');
const GifSicle = require('imagemin-gifsicle');
const JpegTran = require('imagemin-jpegtran');
const OptiPng = require('imagemin-optipng');
const SvGo = require('imagemin-svgo');


let plugs = [];
if (env === 'production') {
  plugs = [new UglifyJsPlugin(), new CleanWebpackPlugin(['dist'])];
}

let conf = {
  mode: env,
  entry: {
    "page": [
      'babel-polyfill',
      './src/page/js/main.js',
      './src/page/sass/index.scss'
    ],
    "labs": [
      'babel-polyfill',
      './src/labs/js/main.js',
      './src/labs/sass/index.scss'
    ]
  },
  output: {
    filename: '[name].js'
  },
  resolve: {
    extensions: ['.js', '.vue', '.json'],
    alias: {
      'vue$': 'vue/dist/vue.common.js'
    }
  },
  plugins: plugs.concat([
    new CopyWebpackPlugin([
      { from: 'src/page/index.html', to: 'index-page.html' },
      { from: 'src/labs/index.html', to: 'index-labs.html' },
      { from: 'src/img', to: 'img' },
      { from: 'src/robots.txt', to: 'robots.txt' }
    ]),
    new Webpack.ProvidePlugin({
      Vue: 'vue/dist/vue.common.js',
      'window.Vue': 'vue/dist/vue.common.js'
    }),
    new VueLoaderPlugin(),
    new ImageminWebpackPlugin(
      {
        name: 'img/[name].[ext]',
        imageminOptions: {
          plugins: [
            SvGo (),
            GifSicle (),
            JpegTran (),
            OptiPng ()
          ]
        }
      }
    )
  ]),
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [
          'style-loader', 'css-loader', 'sass-loader'
        ]
      },
      {
        test: /\.vue$/,
        loader: 'vue-loader',
        options: {
          loaders: [
            { loader: 'css-loader', extract: false }
          ]
        }
      },
      {
        test: /\.js$/,
        loader: 'babel-loader',
        options: {
          presets: [
            [
              'env', {
                targets: {
                  browsers: [ 'since 2015' ]
                }
              }
            ]
          ]
        }
      },
      {
        test: /\.(jpe?g|png|gif|svg)$/i,
        loader: 'file-loader',
      }
    ]
  }
};

module.exports = conf;
