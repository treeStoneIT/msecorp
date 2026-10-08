<script setup>
import { business } from '@/data/business.js'
import SiteImage from './SiteImage.vue'

defineProps({
  headline: { type: String, default: 'Tell us what you need engraved' },
  primary: { type: Boolean, default: true },
})
</script>

<template>
  <section class="py-16 sm:py-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="relative isolate overflow-hidden rounded-3xl bg-zinc-950 px-6 py-16 sm:px-16 sm:py-20">
        <SiteImage slug="lamacoid-laser-engraving-machine" sizes="(min-width: 1280px) 1216px, 100vw" class="absolute inset-0 -z-10 size-full object-cover opacity-30" />
        <h2 class="max-w-[30ch] text-3xl font-semibold tracking-tight text-balance text-white sm:text-4xl">{{ headline }}</h2>
        <p class="mt-6 max-w-[48ch] text-lg/8 text-pretty text-zinc-300">
          Send us the sizes, quantities, colours and planned use, and we will get back to you with a quote as soon as possible.
        </p>
        <div class="mt-10 flex flex-wrap items-center gap-x-6 gap-y-4">
          <RouterLink
            to="/contact"
            class="rounded-full px-4 py-2.5 text-base/7 font-semibold sm:text-sm/6"
            :class="primary ? 'bg-brand-500 text-zinc-950 hover:bg-brand-400' : 'bg-white/10 text-white ring-1 ring-white/20 hover:bg-white/15'"
          >
            Request a quote
          </RouterLink>
          <a :href="`tel:${business.phone}`" class="text-base/7 font-semibold text-white tabular-nums sm:text-sm/6">
            or call {{ business.phoneDisplay }}
          </a>
        </div>
      </div>
    </div>
  </section>
</template>
