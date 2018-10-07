const CopyWebpackPlugin = require('copy-webpack-plugin');
const env = process.env.NODE_ENV === 'production' ? 'production' : 'development';
const Webpack = require('webpack');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const VueLoaderPlugin = require('vue-loader/lib/plugin');

let plugs = [];
if (env === 'production') {
  plugs = [new UglifyJsPlugin(), new CleanWebpackPlugin(['dist'])];
}

let conf = {
  mode: env,
  entry: [
    './src/js/main.js',
    './src/sass/index.scss'
  ],
  output: {
    filename: 'js/[name].js'
  },
  resolve: {
    extensions: ['.js', '.vue', '.json'],
    alias: {
      'vue$': 'vue/dist/vue.common.js'
    }
  },
  plugins: plugs.concat([
    new CopyWebpackPlugin([
      { from: 'src/index.html', to: 'index.html' },
      { from: 'src/img', to: 'img' }
    ]),
    new Webpack.ProvidePlugin({
      Vue: 'vue/dist/vue.common.js',
      'window.Vue': 'vue/dist/vue.common.js'
    }),
    new VueLoaderPlugin()
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
              '@babel/preset-env', {
                targets: {
                  browsers: [ 'since 2015' ]
                },
                useBuiltIns: 'entry'
              }
            ]
          ]
        }
      }
    ]
  }
};

module.exports = conf;
