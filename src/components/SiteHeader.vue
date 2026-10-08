<script setup>
import { onBeforeUnmount, onMounted, ref, watch } from 'vue'
import { useRoute } from 'vue-router'
import { products } from '@/data/products.js'
import { business } from '@/data/business.js'
import AppIcon from './AppIcon.vue'
import SiteImage from './SiteImage.vue'

const route = useRoute()
const mobileOpen = ref(false)
const productsOpen = ref(false)

watch(
  () => route.fullPath,
  () => {
    mobileOpen.value = false
    productsOpen.value = false
  },
)

const productsMenu = ref(null)
let closeTimer
let hoverOpenedAt = 0

const openProducts = (event) => {
  if (event.pointerType !== 'mouse') return
  clearTimeout(closeTimer)
  if (!productsOpen.value) hoverOpenedAt = Date.now()
  productsOpen.value = true
}
const scheduleClose = (event) => {
  if (event.pointerType !== 'mouse') return
  clearTimeout(closeTimer)
  closeTimer = setTimeout(() => (productsOpen.value = false), 250)
}
const toggleProducts = () => {
  if (productsOpen.value && Date.now() - hoverOpenedAt < 600) return
  productsOpen.value = !productsOpen.value
}
const onDocumentClick = (event) => {
  if (productsMenu.value && !productsMenu.value.contains(event.target)) productsOpen.value = false
}
const onKeydown = (event) => {
  if (event.key === 'Escape') productsOpen.value = false
}

onMounted(() => {
  document.addEventListener('click', onDocumentClick)
  document.addEventListener('keydown', onKeydown)
})
onBeforeUnmount(() => {
  clearTimeout(closeTimer)
  document.removeEventListener('click', onDocumentClick)
  document.removeEventListener('keydown', onKeydown)
})

const isProductRoute = (path) => path === '/products' || products.some((p) => path === `/${p.slug}`)
</script>

<template>
  <header class="relative z-20 border-b border-zinc-950/5 bg-white">
    <nav aria-label="Main" class="mx-auto flex h-18 max-w-7xl items-center gap-x-8 px-6 lg:px-8">
      <div class="flex flex-1 items-center">
        <RouterLink to="/" aria-label="Homepage" class="-m-1.5 p-1.5">
          <img src="/images/msecorp-logo.svg" alt="Modern Sign & Engraving Corp" width="1424" height="478" class="h-10 w-auto" />
        </RouterLink>
      </div>

      <div class="flex items-center gap-x-8 max-lg:hidden">
        <div ref="productsMenu" class="relative" @pointerenter="openProducts" @pointerleave="scheduleClose">
          <button
            type="button"
            class="flex items-center gap-x-1 py-6 text-sm/6 font-medium hover:text-zinc-950"
            :class="isProductRoute(route.path) || productsOpen ? 'text-zinc-950' : 'text-zinc-600'"
            :aria-expanded="productsOpen"
            aria-controls="products-menu"
            @click="toggleProducts"
          >
            Products
            <AppIcon name="chevron-down" class="size-5 shrink-0 fill-zinc-400 transition-transform" :class="productsOpen ? 'rotate-180' : ''" />
          </button>
          <div v-show="productsOpen" id="products-menu" class="absolute top-full left-1/2 w-[36rem] -translate-x-1/3">
            <div class="overflow-hidden rounded-2xl bg-white shadow-lg ring-1 ring-zinc-950/5">
              <ul role="list" class="grid grid-cols-2 gap-1 p-3">
                <li v-for="product in products" :key="product.slug">
                  <RouterLink
                    :to="`/${product.slug}`"
                    class="flex items-center gap-x-4 rounded-xl p-3 hover:bg-zinc-50"
                    :class="route.path === `/${product.slug}` ? 'bg-zinc-50' : ''"
                  >
                    <span class="flex size-14 shrink-0 items-center justify-center rounded-lg bg-zinc-100 p-1.5 ring-1 ring-zinc-950/5">
                      <SiteImage :slug="product.image.slug" sizes="56px" class="max-h-full w-auto max-w-full rounded-sm" />
                    </span>
                    <span class="text-sm/6 font-medium text-zinc-950">{{ product.navName }}</span>
                  </RouterLink>
                </li>
              </ul>
              <div class="flex items-center justify-between gap-x-6 bg-zinc-50 px-6 py-4">
                <RouterLink to="/products" class="flex items-center gap-x-2 text-sm/6 font-medium text-zinc-950 hover:text-brand-700">
                  All product lines
                  <AppIcon name="arrow-right" class="size-4 shrink-0 fill-current" />
                </RouterLink>
                <p class="text-sm/6 text-zinc-600">
                  Need something custom?
                  <RouterLink to="/contact" class="font-medium text-brand-700 hover:text-brand-600">Ask for a quote</RouterLink>
                </p>
              </div>
            </div>
          </div>
        </div>
        <RouterLink to="/about" class="text-sm/6 font-medium text-zinc-600 hover:text-zinc-950" active-class="text-zinc-950">About</RouterLink>
        <RouterLink to="/contact" class="text-sm/6 font-medium text-zinc-600 hover:text-zinc-950" active-class="text-zinc-950">Contact</RouterLink>
      </div>

      <div class="flex flex-1 items-center justify-end gap-x-6">
        <a :href="`tel:${business.phone}`" class="text-sm/6 font-medium text-zinc-950 tabular-nums max-sm:hidden">{{ business.phoneDisplay }}</a>
        <RouterLink
          to="/contact"
          class="rounded-full px-3 py-1.5 text-sm/6 font-medium text-zinc-950 ring-1 ring-zinc-950/15 hover:bg-zinc-50 max-lg:hidden"
        >
          Get a quote
        </RouterLink>
        <button type="button" class="relative -m-2.5 rounded-md p-2.5 text-zinc-700 lg:hidden" @click="mobileOpen = true">
          <span class="sr-only">Open main menu</span>
          <AppIcon name="bars-3" class="size-6 shrink-0 stroke-current" />
        </button>
      </div>
    </nav>

    <div v-if="mobileOpen" class="lg:hidden" role="dialog" aria-modal="true" aria-label="Main menu">
      <div class="fixed inset-0 z-30 bg-zinc-950/25" @click="mobileOpen = false"></div>
      <div class="fixed inset-y-0 right-0 z-40 w-full overflow-y-auto bg-white px-6 py-4 sm:max-w-sm sm:ring-1 sm:ring-zinc-950/10">
        <div class="flex h-10 items-center justify-between">
          <RouterLink to="/" aria-label="Homepage" class="-m-1.5 p-1.5">
            <img src="/images/msecorp-logo.svg" alt="Modern Sign & Engraving Corp" width="1424" height="478" class="h-10 w-auto" />
          </RouterLink>
          <button type="button" class="relative -m-2.5 rounded-md p-2.5 text-zinc-700" @click="mobileOpen = false">
            <span class="sr-only">Close menu</span>
            <AppIcon name="x-mark" class="size-6 shrink-0 stroke-current" />
          </button>
        </div>
        <div class="mt-8 flex flex-col gap-y-8">
          <div>
            <p class="text-sm/6 font-medium text-zinc-500">Products</p>
            <ul role="list" class="mt-2 flex flex-col">
              <li v-for="product in products" :key="product.slug">
                <RouterLink :to="`/${product.slug}`" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-medium text-zinc-950 hover:bg-zinc-50">
                  {{ product.navName }}
                </RouterLink>
              </li>
            </ul>
          </div>
          <div class="flex flex-col border-t border-zinc-950/5 pt-6">
            <RouterLink to="/products" class="-mx-3 rounded-lg px-3 py-2 text-base/7 font-medium text-zinc-950 hover:bg-zinc-50">All products</RouterLink>
            <RouterLink to="/about" class="-mx-3 rounded-lg px-3 py-2 text-base/7 font-medium text-zinc-950 hover:bg-zinc-50">About</RouterLink>
            <RouterLink to="/contact" class="-mx-3 rounded-lg px-3 py-2 text-base/7 font-medium text-zinc-950 hover:bg-zinc-50">Contact</RouterLink>
            <a :href="`tel:${business.phone}`" class="-mx-3 rounded-lg px-3 py-2 text-base/7 font-medium text-zinc-950 tabular-nums hover:bg-zinc-50">{{ business.phoneDisplay }}</a>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>
