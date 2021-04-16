const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const path              =   require( 'path' );
const webpack           =   require( 'webpack' );

// Extract CSS for Admin Settings
const settingsCSSPlugin = new MiniCssExtractPlugin({
  filename: 'admin-settings.css'
});

module.exports = [{
  entry: './app/admin.js',
  output: {
      path: path.resolve( __dirname, 'dist' ),
      filename: 'admin-settings.js',
  },
  mode: 'development',
  watch: true,
  devtool: 'cheap-eval-source-map',
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /(node_modules)/,
        use: 'babel-loader',
      },
      {
        test: /\.(sa|sc|c)ss$/,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'sass-loader'
        ]
      }
    ]
  },
  plugins: [
    settingsCSSPlugin
  ]
}];