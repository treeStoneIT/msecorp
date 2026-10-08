<script setup>
import { products } from '@/data/products.js'
import { useSeo } from '@/composables/useSeo.js'
import { breadcrumbSchema } from '@/composables/schema.js'
import SiteImage from '@/components/SiteImage.vue'
import CtaSection from '@/components/CtaSection.vue'

useSeo({
  title: 'Products: Lamacoid Labels, Braille, Safety & Room Signs | Modern Sign & Engraving',
  description:
    'Engraved lamacoid labels and tags, braille and tactile signs, safety, sliding, washroom, directional and room ID signs, plus custom laser engraving. Made in Toronto.',
  path: '/products',
  jsonLd: [breadcrumbSchema([{ name: 'Home', path: '/' }, { name: 'Products', path: '/products' }])],
})
</script>

<template>
  <section class="py-16 sm:py-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <h1 class="max-w-[24ch] text-5xl font-semibold tracking-tight text-balance text-zinc-950">Our products</h1>
      <p class="mt-6 max-w-[56ch] text-lg/8 text-pretty text-zinc-600">
        Our laser engraving machines can produce almost any sign you need to improve your facility’s professionalism and efficiency. Every product is made to your size, colour and wording.
      </p>
      <ul role="list" class="mt-16 flex flex-col gap-y-16">
        <li v-for="(product, index) in products" :key="product.slug" class="grid grid-cols-1 items-center gap-8 lg:grid-cols-2 lg:gap-16">
          <SiteImage
            :slug="product.image.slug"
            :alt="product.image.alt"
            :eager="index === 0"
            sizes="(min-width: 1024px) 600px, 100vw"
            class="aspect-[3/2] w-full rounded-3xl bg-zinc-100 object-cover outline-1 -outline-offset-1 outline-black/5"
            :class="index % 2 ? 'lg:order-last' : ''"
          />
          <div>
            <p class="text-base/7 font-semibold text-brand-700 sm:text-sm/6">{{ product.eyebrow }}</p>
            <h2 class="mt-2 text-3xl font-semibold tracking-tight text-balance text-zinc-950">{{ product.name }}</h2>
            <p class="mt-4 max-w-[52ch] text-base/7 text-pretty text-zinc-600">{{ product.intro }}</p>
            <RouterLink :to="`/${product.slug}`" class="mt-6 inline-block text-base/7 font-semibold text-zinc-950 sm:text-sm/6">
              Learn more<span class="sr-only"> about {{ product.name.toLowerCase() }}</span> <span aria-hidden="true">&rarr;</span>
            </RouterLink>
          </div>
        </li>
      </ul>
    </div>
  </section>
  <CtaSection />
</template>
