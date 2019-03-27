const env = process.env.NODE_ENV === 'production' ? 'production' : 'development';

const VueLoaderPlugin = require('vue-loader/lib/plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const Path = require('path');

const src = Path.resolve(__dirname, 'src');
const dist = Path.resolve(__dirname, 'dist');
const meta = require('./package').meta;

let conf = {
  mode: env,
  target: 'web',
  node: {
    fs: 'empty'
  },
  entry: [
    `${src}/index.js`
  ],
  output: {
    filename: 'index.js',
    chunkFilename: 'js/[chunkhash:16].js',
    path: Path.resolve(__dirname, 'dist', 'assets')
  },
  resolve: {
    aliasFields: ['browser'],
    extensions: ['.js', '.vue', '.json', '.css', '.scss'],
    alias: {
      '@': `${src}/Components`,
      '~': `${src}/Styles`,
      'src': `${src}`,
      'vue$': 'vue/dist/vue.esm.js',
      'img': `${src}/img`
    }
  },
  plugins: [
    new VueLoaderPlugin(),
    new HtmlWebpackPlugin(meta)
  ],
  module: {
    rules: [
      {
        test: /\.(eot|ttf|woff|woff2|otf)$/,
        use: [
          'file-loader'
        ]
      },
      {
        test: /\.vue$/,
        use: [
          'vue-loader'
        ]
      },
      {
        test: /\.js$/,
        exclude: /node_modules/,
        loader: 'babel-loader'
      },
      {
        test: /\.scss$/,
        use: [
          'vue-style-loader',
          'css-loader', {
            loader: 'sass-loader',
            options: {
              implementation: require('sass')
            }
          }
        ]
      },
      {
        test: /\.css$/,
        use: [
          'vue-style-loader',
          'css-loader'
        ]
      },
      {
        test: /\.(jpe?g|png|gif|svg)$/i,
        use: [
          {
            loader: 'url-loader',
            options: {
              limit: 10000,
              fallback: 'file-loader',
              outputPath: 'img'
            }
          }
        ]
      }
    ]
  }
};

if (env === 'development') {
  conf.devServer = {
    contentBase: dist,
    compress: true,
    port: 9000,
    hot: true,
    open: true,
    historyApiFallback: {
      rewrites: [
        { from: /^\/$/, to: 'index.html' }
      ]
    },
    overlay: {
      warnings: true,
      errors: true
    }
  };
}

module.exports = conf;
