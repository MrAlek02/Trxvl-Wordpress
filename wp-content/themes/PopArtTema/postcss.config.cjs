module.exports = {
  plugins: [
    require('postcss-preset-env'),
    require('postcss-sort-media-queries')({
      sort: 'desktop-first'
    })
  ]
};
