import { defineConfig } from 'vite';
import { NodePackageImporter } from 'sass-embedded';
import liveReload from 'vite-plugin-live-reload';
import path from 'path';
import fs from 'fs';

import dotenv from 'dotenv';

// Load environment variables from .env file
dotenv.config();

// Function to get all SCSS entries from template-parts
const getScssEntries = () => {
  const templatePartsDir = path.resolve(__dirname, 'template-parts');
  const subDirectories = fs
    .readdirSync(templatePartsDir)
    .filter((file) =>
      fs.statSync(path.join(templatePartsDir, file)).isDirectory()
    );

  const entries = {};
  subDirectories.forEach((dir) => {
    const scssPath = path.join(templatePartsDir, dir, `${dir}.scss`);
    if (fs.existsSync(scssPath) && path.extname(scssPath) === '.scss') {
      entries[dir] = scssPath;
    }
  });

  return entries;
};

export default defineConfig({
  base: './',
  plugins: [
    liveReload(['**/*.php']) // Enable live reloading for PHP files
  ],
  server: {
    // npm run dev will open the browser with this url
    open: process.env.SITE_URL
  },
  build: {
    target: 'es2015',
    outDir: path.resolve(__dirname, 'dist/'),
    manifest: true,
    rollupOptions: {
      input: {
        main: 'src/ts/main.ts',
        ...getScssEntries()
      },
      output: {
        entryFileNames: '[name].[hash].js',
        assetFileNames: '[name].[hash].[ext]'
      }
    }
  },
  css: {
    postcss: 'postcss.config.js',
    preprocessorOptions: {
      scss: {
        api: 'modern',
        importer: new NodePackageImporter(),
        additionalData: `@use "@/scss/global" as *;`
      }
    }
  },
  resolve: {
    alias: {
      '@': path.resolve(__dirname, 'src/')
    }
  }
});
