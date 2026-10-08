<script setup>
import { products } from '@/data/products.js'
import { business } from '@/data/business.js'

const year = new Date().getFullYear()
</script>

<template>
  <footer class="border-t border-zinc-950/5 bg-white">
    <div class="mx-auto max-w-7xl px-6 py-16 lg:px-8">
      <div class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-4">
        <div class="flex flex-col gap-y-4">
          <RouterLink to="/" aria-label="Homepage">
            <img src="/images/msecorp-logo.svg" alt="Modern Sign & Engraving Corp" width="1424" height="478" class="h-7 w-auto" />
          </RouterLink>
          <p class="max-w-[40ch] text-base/7 text-pretty text-zinc-600 sm:text-sm/6">
            Engraved lamacoid labels, braille and safety signs, made in Toronto since {{ business.foundingYear }}.
          </p>
        </div>
        <div class="lg:col-span-2">
          <h2 class="text-sm/6 font-semibold text-zinc-950">Products</h2>
          <ul role="list" class="mt-4 grid grid-cols-1 gap-x-8 gap-y-3 sm:grid-cols-2">
            <li v-for="product in products" :key="product.slug">
              <RouterLink :to="`/${product.slug}`" class="text-base/7 font-normal text-zinc-600 hover:text-zinc-950 sm:text-sm/6">{{ product.navName }}</RouterLink>
            </li>
          </ul>
        </div>
        <div>
          <h2 class="text-sm/6 font-semibold text-zinc-950">Contact</h2>
          <address class="mt-4 flex flex-col gap-y-3 text-base/7 text-zinc-600 not-italic sm:text-sm/6">
            <p>{{ business.address.street }}<br />{{ business.address.city }}, {{ business.address.region }} {{ business.address.postalCode }}</p>
            <a :href="`tel:${business.phone}`" class="font-normal tabular-nums hover:text-zinc-950">{{ business.phoneDisplay }}</a>
            <a :href="`mailto:${business.email}`" class="font-normal hover:text-zinc-950">{{ business.email }}</a>
          </address>
        </div>
      </div>
      <div class="mt-16 flex flex-col gap-4 border-t border-zinc-950/5 pt-8 sm:flex-row sm:items-center sm:justify-between">
        <p class="text-sm/6 text-zinc-500">&copy; {{ year }} {{ business.name }}</p>
        <div class="flex gap-x-6">
          <RouterLink to="/about" class="text-sm/6 font-normal text-zinc-500 hover:text-zinc-950">About</RouterLink>
          <RouterLink to="/products" class="text-sm/6 font-normal text-zinc-500 hover:text-zinc-950">Products</RouterLink>
          <RouterLink to="/contact" class="text-sm/6 font-normal text-zinc-500 hover:text-zinc-950">Contact</RouterLink>
        </div>
      </div>
    </div>
  </footer>
</template>
