<script setup>
import { computed } from 'vue'
import { products, findProduct } from '@/data/products.js'
import { useSeo } from '@/composables/useSeo.js'
import { breadcrumbSchema, faqSchema, serviceSchema } from '@/composables/schema.js'
import SiteImage from '@/components/SiteImage.vue'
import AppIcon from '@/components/AppIcon.vue'
import FaqList from '@/components/FaqList.vue'
import CtaSection from '@/components/CtaSection.vue'
import SignSample from '@/components/SignSample.vue'
import { samples as allSamples } from '@/data/samples.js'

const props = defineProps({ slug: { type: String, required: true } })
const product = findProduct(props.slug)
const path = `/${product.slug}`
const image = `/images/${product.image.slug}-1280.webp`

useSeo({
  title: product.metaTitle,
  description: product.metaDescription,
  path,
  image,
  jsonLd: [
    serviceSchema({ name: product.name, description: product.metaDescription, path, image }),
    breadcrumbSchema([
      { name: 'Home', path: '/' },
      { name: 'Products', path: '/products' },
      { name: product.name, path },
    ]),
    faqSchema(product.faqs),
  ],
})

const samples = allSamples[product.slug] || []

const related = computed(() => products.filter((p) => p.slug !== product.slug).slice(0, 3))
</script>

<template>
  <section class="py-16 sm:py-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <nav aria-label="Breadcrumb">
        <ol role="list" class="flex items-center gap-x-2 text-sm/6 text-zinc-500">
          <li><RouterLink to="/" class="font-normal hover:text-zinc-950">Home</RouterLink></li>
          <li aria-hidden="true">/</li>
          <li><RouterLink to="/products" class="font-normal hover:text-zinc-950">Products</RouterLink></li>
          <li aria-hidden="true">/</li>
          <li aria-current="page" class="text-zinc-950">{{ product.name }}</li>
        </ol>
      </nav>
      <div class="mt-10 grid grid-cols-1 items-center gap-16 lg:grid-cols-2">
        <div>
          <p class="text-base/7 font-semibold text-brand-700 sm:text-sm/6">{{ product.eyebrow }}</p>
          <h1 class="mt-4 max-w-[24ch] text-5xl font-semibold tracking-tight text-balance text-zinc-950">{{ product.headline }}</h1>
          <p class="mt-6 max-w-[48ch] text-lg/8 text-pretty text-zinc-600">{{ product.intro }}</p>
          <div class="mt-10 flex flex-wrap items-center gap-x-6 gap-y-4">
            <RouterLink to="/contact" class="rounded-full bg-brand-500 px-4 py-2.5 text-base/7 font-semibold text-zinc-950 hover:bg-brand-400 sm:text-sm/6">Request a quote</RouterLink>
            <RouterLink to="/products" class="text-base/7 font-semibold text-zinc-950 sm:text-sm/6">All products <span aria-hidden="true">&rarr;</span></RouterLink>
          </div>
        </div>
        <SiteImage :slug="product.image.slug" :alt="product.image.alt" eager sizes="(min-width: 1024px) 600px, 100vw" class="aspect-[4/3] w-full rounded-3xl bg-zinc-100 object-contain p-8 sm:p-10 outline-1 -outline-offset-1 outline-black/5" />
      </div>
    </div>
  </section>

  <section class="bg-zinc-50 py-16 sm:py-24">
    <div class="mx-auto grid max-w-7xl grid-cols-1 gap-16 px-6 lg:grid-cols-3 lg:px-8">
      <div>
        <h2 class="text-3xl font-semibold tracking-tight text-balance text-zinc-950">{{ product.usesHeading }}</h2>
        <ul role="list" class="mt-8 flex flex-col gap-y-3">
          <li v-for="use in product.uses" :key="use" class="flex gap-x-3 text-base/7 text-zinc-700">
            <AppIcon name="check" class="mt-1 size-5 shrink-0 fill-brand-600" />
            {{ use }}
          </li>
        </ul>
      </div>
      <div class="lg:col-span-2">
        <h2 class="text-3xl font-semibold tracking-tight text-balance text-zinc-950">Options</h2>
        <dl class="mt-8 grid grid-cols-1 gap-x-8 gap-y-10 sm:grid-cols-2">
          <div v-for="option in product.options" :key="option.name" class="border-t border-zinc-950/10 pt-4">
            <dt class="text-base/7 font-semibold text-zinc-950">{{ option.name }}</dt>
            <dd class="mt-2 text-base/7 text-pretty text-zinc-600 sm:text-sm/6">{{ option.description }}</dd>
          </div>
        </dl>
      </div>
    </div>
  </section>

  <section v-if="product.gallery.length || samples.length" class="py-16 sm:py-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <h2 class="text-3xl font-semibold tracking-tight text-balance text-zinc-950">Examples</h2>
      <ul v-if="product.gallery.length" role="list" class="mt-10 grid grid-cols-2 gap-4 sm:gap-6 lg:grid-cols-4">
        <li v-for="photo in product.gallery" :key="photo.slug">
          <SiteImage :slug="photo.slug" :alt="photo.alt" sizes="(min-width: 1024px) 300px, 50vw" class="aspect-square w-full rounded-2xl bg-zinc-100 object-contain p-4 outline-1 -outline-offset-1 outline-black/5" />
        </li>
      </ul>
      <div v-if="samples.length" class="mt-16">
        <h3 class="text-lg/7 font-semibold text-zinc-950">Sample layouts</h3>
        <p class="mt-2 max-w-[60ch] text-base/7 text-pretty text-zinc-600 sm:text-sm/6">
          A few common wordings and colour combinations to get you started. Every sign is made to order with your text, size and colours.
        </p>
        <ul role="list" class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
          <li v-for="(sample, index) in samples" :key="index">
            <div class="flex aspect-[3/2] items-center justify-center rounded-2xl bg-zinc-100 p-8 outline-1 -outline-offset-1 outline-black/5">
              <SignSample :sample="sample" />
            </div>
            <p class="mt-3 text-sm/6 text-zinc-600">{{ sample.caption }}</p>
          </li>
        </ul>
      </div>
    </div>
  </section>

  <section class="py-16 sm:py-24">
    <div class="mx-auto grid max-w-7xl grid-cols-1 gap-12 px-6 lg:grid-cols-3 lg:px-8">
      <h2 class="text-3xl font-semibold tracking-tight text-balance text-zinc-950">Frequently asked questions</h2>
      <div class="lg:col-span-2"><FaqList :faqs="product.faqs" /></div>
    </div>
  </section>

  <section class="border-t border-zinc-950/5 py-16 sm:py-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <h2 class="text-3xl font-semibold tracking-tight text-balance text-zinc-950">Other products</h2>
      <ul role="list" class="mt-10 grid grid-cols-1 gap-x-8 gap-y-12 sm:grid-cols-3">
        <li v-for="item in related" :key="item.slug" class="group relative">
          <SiteImage :slug="item.image.slug" sizes="(min-width: 640px) 33vw, 100vw" class="aspect-[3/2] w-full rounded-2xl bg-zinc-100 object-contain p-6 outline-1 -outline-offset-1 outline-black/5" />
          <h3 class="mt-6 text-lg/7 font-semibold text-zinc-950">
            <RouterLink :to="`/${item.slug}`"><span class="absolute inset-0"></span>{{ item.name }}</RouterLink>
          </h3>
          <p class="mt-2 text-base/7 text-pretty text-zinc-600 sm:text-sm/6">{{ item.summary }}</p>
        </li>
      </ul>
    </div>
  </section>

  <CtaSection :primary="false" :headline="`Need ${product.name.toLowerCase()}? Tell us what you need`" />
</template>
