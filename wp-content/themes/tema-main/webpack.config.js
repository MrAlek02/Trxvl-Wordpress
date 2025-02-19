const fs = require("fs");
const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const RemoveEmptyScriptsPlugin = require("webpack-remove-empty-scripts");
const ESLintPlugin = require("eslint-webpack-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");

const getDirectories = (srcPath) => fs.readdirSync(srcPath).filter((file) => fs.statSync(path.join(srcPath, file)).isDirectory());

const subDirectories = getDirectories("template-parts");

const templateEntries = {};

subDirectories.forEach((dir) => {
  if (fs.existsSync(`./template-parts/${dir}/${dir}.scss`)) {
    templateEntries[`${dir}`] = [`./template-parts/${dir}/${dir}.scss`];
  }
});

module.exports = (env, argv) => {
  const cssLoaders = [
    MiniCssExtractPlugin.loader,
    "css-loader",
    "postcss-loader",
    "sass-loader",
    {
      loader: "sass-resources-loader",
      options: {
        resources: [path.resolve(__dirname, "./src/scss/global.scss")],
      },
    },
  ];

  if (argv.mode === "development") {
    cssLoaders.splice(2, 1);
  }

  return {
    entry: {
      ...templateEntries,
      main: ["./src/ts/main.ts"],
      404: ["./src/scss/404.scss"],
      //"output-name": [".src/scss/filename.scss"] it will be added and exported to public, then load it in theme-styles
    },
    output: {
      filename: "[name].js",
      path: path.resolve(__dirname, "public"),
    },
    module: {
      rules: [
        {
          test: /\.scss/,
          use: cssLoaders,
        },
        {
          test: /\.tsx?$/,
          use: "ts-loader",
          exclude: /node_modules/,
        },
        { test: /\.(glsl|vs|fs)$/, loader: "ts-shader-loader" },
      ],
    },
    resolve: {
      extensions: [".wasm", ".ts", ".tsx", ".mjs", ".cjs", ".js", ".json"],
    },
    optimization: {
      minimize: true,
      minimizer: [
        `...`,
        new CssMinimizerPlugin(),
      ],
    },
    plugins: [
      new RemoveEmptyScriptsPlugin(),
      new MiniCssExtractPlugin(),
      new ESLintPlugin(),
    ],
  };
};