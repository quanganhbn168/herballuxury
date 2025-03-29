import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';
import FullReload from 'vite-plugin-full-reload';

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: [
        'resources/views/**/*.blade.php',
        'routes/**/*.php'
      ],
    }),
    FullReload(['resources/views/**/*.blade.php']),
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false,
        },
      },
    }),
  ],
  build: {
    outDir: 'public/build',
    manifest: true,
  },
  resolve: {
    alias: {
      'vue': 'vue/dist/vue.esm-bundler.js',
      '@': path.resolve(__dirname, './resources/js')
    }
  },
  server: {
    hmr: {
      host: 'localhost',
      protocol: 'ws',
      port: 5173
    },
    watch: {
      usePolling: true,
      interval: 1000,
      ignored: [
      '**/.git/**',
      '**/node_modules/**',
      '**/storage/**',
      '**/vendor/**'
      ]
    }
  }
});