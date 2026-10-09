import { readFileSync } from 'node:fs'
import { fileURLToPath } from 'node:url'
import vue from '@vitejs/plugin-vue'
import tailwindcss from '@tailwindcss/vite'
import sitemap from 'vite-plugin-sitemap'

// Derive sitemap routes from the router by extracting each route's `path`.
// Read as text so the router's `.vue` imports aren't pulled into the config bundle.
const routerSource = readFileSync(fileURLToPath(new URL('./src/router.js', import.meta.url)), 'utf-8')
const dynamicRoutes = [...routerSource.matchAll(/path:\s*'([^']+)'/g)]
  .map((m) => m[1])
  .filter((p) => p !== '/' && p !== '/404')

const changefreq = {
  '*': 'monthly',
}

const priority = {
  '*': 0.9,
  '/': 1.0,
  '/about': 0.7,
  '/contact': 0.7,
}

/** @type {import('vite').UserConfig} */
export default {
  plugins: [
    vue(),
    tailwindcss(),
    sitemap({
      hostname: 'https://modernsign.ca',
      dynamicRoutes,
      readable: true,
      changefreq,
      priority,
    }),
  ],
  resolve: {
    alias: {
      '@': '/src',
    },
  },
  ssgOptions: {
    script: 'async',
    beastiesOptions: {
      preload: 'media',
      inlineThreshold: 40000,
    },
  },
}
