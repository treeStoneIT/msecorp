<script setup>
import { products } from '@/data/products.js'
import { business } from '@/data/business.js'
import { useSeo } from '@/composables/useSeo.js'
import { localBusinessSchema } from '@/composables/schema.js'
import SiteImage from '@/components/SiteImage.vue'
import CtaSection from '@/components/CtaSection.vue'

useSeo({
  title: 'Modern Sign & Engraving Corp | Engraved Lamacoid, Braille & Safety Signs in Toronto',
  description:
    'Custom laser engraved lamacoid labels, braille and tactile signs, safety, washroom, sliding and directional signs for commercial, electrical and industrial buildings. Toronto, since 1980.',
  path: '/',
  jsonLd: [localBusinessSchema()],
})

const heroColumns = [
  ['img-4248', 'img-4250', 'img-4279'],
  ['img-4270', 'img-4269', 'img-4282', 'img-4283'],
  ['img-4278', 'img-4267', 'img-4285', 'img-4258'],
]

const gridProducts = products.filter((p) => p.slug !== 'custom-engraving')

const highlights = [
  {
    name: `Serving businesses since ${business.foundingYear}`,
    description: 'Founded in 1980, we have made signs for hundreds of businesses, from builders and contractors to suppliers and property managers.',
  },
  {
    name: 'Laser engraved in house',
    description: 'Our laser engraving machines produce crisp, durable lettering on lamacoid, plastics and metal-look finishes.',
  },
  {
    name: 'Made to your spec',
    description: 'Any size, shape, colour and wording, from a single replacement label to a full set for a new building.',
  },
  {
    name: 'Personal service',
    description: 'We are known for personal customer service and reliability. You deal directly with the people who make your signs.',
  },
]

const steps = [
  { name: 'Send us the details', description: 'Sizes, quantities, colours, wording and where the signs will be used. A schedule, drawing or photo helps.' },
  { name: 'Get your quote', description: 'We confirm the details with you and send a quote.' },
  { name: 'We engrave your signs', description: 'Your labels and signs are laser engraved at our Toronto shop.' },
]

const work = [
  { slug: 'img-4270', alt: 'Red engraved sign reading access to the electrical room and fire panel' },
  { slug: 'img-4267', alt: 'Engraved floor and stairwell sign reading 12 floor, stair A' },
  { slug: 'img-4278', alt: 'Yellow engraved warning sign for live wires' },
  { slug: 'img-4269', alt: 'Universal restroom sign with braille' },
  { slug: 'img-4283', alt: 'Engraved lamacoid transformer label' },
  { slug: 'img-4279', alt: 'Black men’s washroom sign' },
]
</script>

<template>
  <section class="relative isolate overflow-hidden bg-zinc-100 bg-[repeating-linear-gradient(0deg,rgb(255_255_255/0.5)_0_1px,transparent_1px_3px)]">
    <div class="mx-auto max-w-7xl px-6 pt-16 pb-20 sm:pt-24 lg:px-8 lg:py-40">
      <div class="lg:max-w-lg">
        <p class="text-base/7 font-semibold text-brand-700 sm:text-sm/6">Toronto sign &amp; engraving shop since {{ business.foundingYear }}</p>
        <h1 class="mt-4 max-w-[24ch] text-5xl font-semibold tracking-tight text-balance text-zinc-950 sm:text-6xl">Engraved lamacoid, braille and safety signs</h1>
        <p class="mt-6 max-w-[48ch] text-lg/8 text-pretty text-zinc-700">
          Custom laser engraved lamacoids of all kinds for commercial, electrical and industrial applications, made to your exact size, colour and wording.
        </p>
        <div class="mt-10 flex flex-wrap items-center gap-x-6 gap-y-4">
          <RouterLink to="/contact" class="rounded-full bg-brand-500 px-4 py-2.5 text-base/7 font-semibold text-zinc-950 hover:bg-brand-400 sm:text-sm/6">Request a quote</RouterLink>
          <RouterLink to="/products" class="text-base/7 font-semibold text-zinc-950 sm:text-sm/6">See our products <span aria-hidden="true">&rarr;</span></RouterLink>
        </div>
      </div>
      <ul role="list" aria-hidden="true" class="-mx-6 mt-12 flex gap-4 overflow-x-auto px-6 pb-2 lg:hidden">
        <li v-for="slug in heroColumns.flat()" :key="slug" class="shrink-0">
          <SiteImage :slug="slug" sizes="200px" class="h-36 w-auto rounded-xl shadow-md ring-1 ring-zinc-950/5" />
        </li>
      </ul>
    </div>
    <div aria-hidden="true" class="pointer-events-none absolute inset-y-0 left-1/2 hidden translate-x-8 items-center gap-8 lg:flex">
      <div v-for="(column, index) in heroColumns" :key="index" class="flex w-44 shrink-0 flex-col gap-8">
        <SiteImage
          v-for="slug in column"
          :key="slug"
          :slug="slug"
          eager
          sizes="176px"
          class="h-auto w-full rounded-xl shadow-lg ring-1 ring-zinc-950/5"
        />
      </div>
    </div>
  </section>

  <section class="py-16 sm:py-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <h2 class="max-w-[35ch] text-4xl font-semibold tracking-tight text-balance text-zinc-950">Our product lines</h2>
      <p class="mt-6 max-w-[48ch] text-lg/8 text-pretty text-zinc-600">
        A cost-effective way to label anything in your facility, with a professional, polished look.
      </p>
      <ul role="list" class="mt-16 grid grid-cols-1 gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-3">
        <li v-for="product in gridProducts" :key="product.slug" class="group relative">
          <SiteImage :slug="product.image.slug" sizes="(min-width: 1024px) 400px, (min-width: 640px) 50vw, 100vw" class="aspect-[3/2] w-full rounded-2xl bg-zinc-100 object-contain p-6 outline-1 -outline-offset-1 outline-black/5" />
          <h3 class="mt-6 text-lg/7 font-semibold text-zinc-950">
            <RouterLink :to="`/${product.slug}`"><span class="absolute inset-0"></span>{{ product.name }}</RouterLink>
          </h3>
          <p class="mt-2 text-base/7 text-pretty text-zinc-600 sm:text-sm/6">{{ product.summary }}</p>
        </li>
      </ul>
      <div class="group relative mt-16 grid grid-cols-1 items-center gap-8 rounded-3xl bg-zinc-950 p-6 sm:p-10 lg:grid-cols-2 lg:gap-16">
        <SiteImage slug="shutterstock-626712152" alt="Laser engraving machine head over a workpiece" sizes="(min-width: 1024px) 560px, 100vw" class="aspect-[3/2] w-full rounded-2xl object-cover" />
        <div>
          <h3 class="text-3xl font-semibold tracking-tight text-balance text-white">
            <RouterLink to="/custom-engraving"><span class="absolute inset-0"></span>Something else in mind?</RouterLink>
          </h3>
          <p class="mt-4 max-w-[48ch] text-base/7 text-pretty text-zinc-300">
            Custom designs are our specialty. Send us a sketch, drawing, photo or logo and we will laser engrave labels, plates and signs in the shape and size you need.
          </p>
          <p class="mt-6 text-base/7 font-semibold text-brand-400 sm:text-sm/6">Custom laser engraving <span aria-hidden="true">&rarr;</span></p>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-zinc-50 py-16 sm:py-24">
    <div class="mx-auto grid max-w-7xl grid-cols-1 gap-16 px-6 lg:grid-cols-2 lg:px-8">
      <div>
        <h2 class="max-w-[35ch] text-4xl font-semibold tracking-tight text-balance text-zinc-950">Why businesses choose Modern Sign</h2>
        <p class="mt-6 max-w-[48ch] text-lg/8 text-pretty text-zinc-600">
          Our machines can make almost any sign you need to improve your facility’s professionalism and efficiency.
        </p>
        <dl class="mt-12 grid grid-cols-1 gap-x-8 gap-y-10 sm:grid-cols-2">
          <div v-for="item in highlights" :key="item.name" class="border-t border-zinc-950/10 pt-4">
            <dt class="text-base/7 font-semibold text-zinc-950">{{ item.name }}</dt>
            <dd class="mt-2 text-base/7 text-pretty text-zinc-600 sm:text-sm/6">{{ item.description }}</dd>
          </div>
        </dl>
      </div>
      <div class="grid grid-cols-2 content-start gap-4 sm:grid-cols-3 sm:gap-6 lg:grid-cols-2 xl:grid-cols-3">
        <SiteImage v-for="photo in work" :key="photo.slug" :slug="photo.slug" :alt="photo.alt" sizes="(min-width: 1024px) 200px, 33vw" class="aspect-square w-full rounded-2xl object-contain p-3 bg-zinc-100 outline-1 -outline-offset-1 outline-black/5" />
      </div>
    </div>
  </section>

  <section class="py-16 sm:py-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <h2 class="max-w-[35ch] text-4xl font-semibold tracking-tight text-balance text-zinc-950">How ordering works</h2>
      <dl class="mt-12 grid grid-cols-1 gap-x-8 gap-y-10 md:grid-cols-3">
        <div v-for="(step, index) in steps" :key="step.name" class="border-t border-zinc-950/10 pt-4">
          <dt class="text-base/7 font-semibold text-zinc-950"><span class="text-brand-700 tabular-nums">0{{ index + 1 }}</span> {{ step.name }}</dt>
          <dd class="mt-2 text-base/7 text-pretty text-zinc-600 sm:text-sm/6">{{ step.description }}</dd>
        </div>
      </dl>
    </div>
  </section>

  <CtaSection :primary="false" />
</template>
