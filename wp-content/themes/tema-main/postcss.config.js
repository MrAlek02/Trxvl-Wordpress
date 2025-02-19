module.exports = {
  plugins: [
    require("postcss-preset-env"),
    require("postcss-combine-media-query"),
    require("postcss-sort-media-queries")({
      sort: "desktop-first",
    }),
  ],
};
