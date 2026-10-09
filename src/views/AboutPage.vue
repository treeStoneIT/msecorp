<script setup>
import { business } from '@/data/business.js'
import { useSeo } from '@/composables/useSeo.js'
import { localBusinessSchema, breadcrumbSchema } from '@/composables/schema.js'
import SiteImage from '@/components/SiteImage.vue'
import CtaSection from '@/components/CtaSection.vue'

useSeo({
  title: 'About Us | Modern Sign & Engraving Corp, Toronto Since 1980',
  description:
    'Modern Sign & Engraving Corp has made engraved lamacoid labels, braille and safety signs in Toronto since 1980, known for personal service and reliability.',
  path: '/about',
  jsonLd: [localBusinessSchema(), breadcrumbSchema([{ name: 'Home', path: '/' }, { name: 'About', path: '/about' }])],
})

const values = [
  { name: 'Personal service', description: 'You deal directly with the people who make your signs, from the first question to the finished order.' },
  { name: 'Reliability', description: 'Businesses come back to us for decades because we do what we say.' },
  { name: 'Craft', description: 'Every label and sign is laser engraved for crisp, durable lettering.' },
]
</script>

<template>
  <section class="py-16 sm:py-24">
    <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-16 px-6 lg:grid-cols-2 lg:px-8">
      <div>
        <p class="text-base/7 font-semibold text-brand-700 sm:text-sm/6">About us</p>
        <h1 class="mt-4 max-w-[24ch] text-5xl font-semibold tracking-tight text-balance text-zinc-950">A Toronto engraving shop since {{ business.foundingYear }}</h1>
        <div class="mt-6 flex max-w-[56ch] flex-col gap-y-6 text-lg/8 text-pretty text-zinc-600">
          <p>
            Founded in {{ business.foundingYear }}, Modern Sign &amp; Engraving Corp has served hundreds of businesses including builders, contractors, suppliers and property managers.
          </p>
          <p>
            We make engraved lamacoid labels and tags, braille and tactile signs, safety, washroom, sliding, directional and room ID signs, and custom laser engraving, all from our shop at {{ business.address.street }} in Toronto.
          </p>
          <p>We are known for our personal customer service and reliability.</p>
        </div>
      </div>
      <SiteImage slug="engrave-lasers" alt="Laser engraving in progress" eager sizes="(min-width: 1024px) 600px, 85vw" class="aspect-[4/3] w-full rounded-3xl bg-zinc-100 object-cover outline-1 -outline-offset-1 outline-black/5" />
    </div>
  </section>
  <section class="bg-zinc-50 py-16 sm:py-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <h2 class="text-3xl font-semibold tracking-tight text-balance text-zinc-950">How we work</h2>
      <dl class="mt-10 grid grid-cols-1 gap-x-8 gap-y-10 md:grid-cols-3">
        <div v-for="value in values" :key="value.name" class="border-t border-zinc-950/10 pt-4">
          <dt class="text-base/7 font-semibold text-zinc-950">{{ value.name }}</dt>
          <dd class="mt-2 text-base/7 text-pretty text-zinc-600 sm:text-sm/6">{{ value.description }}</dd>
        </div>
      </dl>
    </div>
  </section>
  <CtaSection />
</template>
