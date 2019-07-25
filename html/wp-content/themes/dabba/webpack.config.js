const path = require('path');
const webpack = require('webpack');
const minJSON = require('jsonminify')

const plugins = {
	progress: require('webpackbar'),
	clean: require('clean-webpack-plugin'),
	extractCSS: require('mini-css-extract-plugin')
}

module.exports = (env = {}, argv) => {
	const isProduction = argv.mode === 'production'
	let envPath = 'assets';

	let config = {
		context: path.resolve(__dirname, 'src'),

		entry: {
			editor: [
				'./styles/editor.scss',
			],
			admin: [
				'./styles/admin.scss'
			],
			app: [
				'./styles/app.scss',
				'./scripts/app.js'
			],
			bootstrap: [
				'./styles/bootstrap.scss',
				'./scripts/bootstrap.js'
			],
			fontawesome: [
				'./styles/fontawesome.scss'
			],
			woocommerce: [
				'./styles/woocommerce.scss',
			]
		},

		output: {
			path: path.resolve(__dirname, envPath),
			publicPath: '',
			filename: 'js/[name].build.js'
		},
		module: {
			rules: [
				{
					test: /\.((s[ac]|c)ss)$/,
					use: [
						plugins.extractCSS.loader,
						{
							loader: 'css-loader',
							options: {
								sourceMap: !isProduction,
								url: false 
							}
						},
						{
							loader: 'postcss-loader',
							options: {
								ident: 'postcss',
								sourceMap: !isProduction,
								plugins: (() => [
									require('autoprefixer')(),
									...isProduction ? [
										require('cssnano')({
											preset: ['default', {
												minifySelectors: false,
												normalizeWhitespace: false,
												discardComments: false,
												calc: false,
											}]
										})
									] : []
								])
							}
						},
						{
							loader: 'sass-loader',
							options: {
								outputStyle: 'expanded',
								sourceMap: !isProduction
							}
						}
					]
				},
				{
					test: /\.js$/,
					exclude: /node_modules/,
					use: {
						loader: 'babel-loader',
						options: {
							presets: [
								'@babel/preset-env'
							]
						}
					}
				},
				{
					test: /.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
					use: [{
						loader: 'file-loader',
						options: {
							name: '[name].[ext]',
							outputPath: 'webfonts/',
							publicPath: '../webfonts/' // use relative urls
						}
					}]
				},
			]
		},

		plugins: (() => {

			let common = [
				new plugins.clean(['assets/css']),
				new plugins.extractCSS({
					filename: 'css/[name].build.css'
				}),
				new plugins.progress({
					color: '#5C95EE'
				})
				,
				new webpack.ProvidePlugin({
					$: "jquery",
					jQuery: "jquery"
				   })

			]
			const production = [

			]


			return isProduction ? common.concat(production) : common
		})(),

		devtool: (() => {
			return isProduction
				? '' // 'hidden-source-map'
				: 'source-map'
		})(),

		resolve: {
			modules: [path.resolve(__dirname, 'src'), 'node_modules'],
			alias: {
				'~': path.resolve(__dirname, 'src/scripts/')
			}
		},

		stats: 'errors-only'
	}
	return config
}