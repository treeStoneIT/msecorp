<script setup>
import { computed } from 'vue'
import { useRoute } from 'vue-router'
import { business } from '@/data/business.js'
import { useSeo } from '@/composables/useSeo.js'
import { localBusinessSchema, breadcrumbSchema } from '@/composables/schema.js'
import AppIcon from '@/components/AppIcon.vue'

useSeo({
  title: 'Contact & Quotes | Modern Sign & Engraving Corp, Toronto',
  description:
    'Request a quote for engraved lamacoid labels, braille, safety, washroom and directional signs. Call (416) 668-0144 or visit us at 66 Sultana Ave, Toronto.',
  path: '/contact',
  jsonLd: [localBusinessSchema(), breadcrumbSchema([{ name: 'Home', path: '/' }, { name: 'Contact', path: '/contact' }])],
})

const route = useRoute()
const sent = computed(() => 'sent' in route.query)

const inputClass =
  'block w-full rounded-lg bg-white px-3 py-2 text-base/7 text-zinc-950 outline-1 -outline-offset-1 outline-zinc-950/15 placeholder:text-zinc-400 focus:outline-2 focus:-outline-offset-2 focus:outline-brand-600 sm:text-sm/6'
</script>

<template>
  <section class="py-16 sm:py-24">
    <div class="mx-auto grid max-w-7xl grid-cols-1 gap-16 px-6 lg:grid-cols-5 lg:px-8">
      <div class="lg:col-span-2">
        <h1 class="max-w-[24ch] text-5xl font-semibold tracking-tight text-balance text-zinc-950">Get in touch</h1>
        <p class="mt-6 max-w-[48ch] text-lg/8 text-pretty text-zinc-600">
          It helps to include as much information as possible, like sizes, quantities, colours and how the signs will be used. We will get back to you as soon as possible.
        </p>
        <dl class="mt-12 flex flex-col gap-y-6 text-base/7 text-zinc-600">
          <div class="flex gap-x-4">
            <dt class="flex-none"><span class="sr-only">Address</span><AppIcon name="map-pin" class="size-6 shrink-0 stroke-zinc-400" /></dt>
            <dd>{{ business.address.street }}<br />{{ business.address.city }}, {{ business.address.region }} {{ business.address.postalCode }}</dd>
          </div>
          <div class="flex gap-x-4">
            <dt class="flex-none"><span class="sr-only">Phone</span><AppIcon name="phone" class="size-6 shrink-0 stroke-zinc-400" /></dt>
            <dd><a :href="`tel:${business.phone}`" class="font-normal tabular-nums hover:text-zinc-950">{{ business.phoneDisplay }}</a></dd>
          </div>
          <div class="flex gap-x-4">
            <dt class="flex-none"><span class="sr-only">Email</span><AppIcon name="envelope" class="size-6 shrink-0 stroke-zinc-400" /></dt>
            <dd><a :href="`mailto:${business.email}`" class="font-normal hover:text-zinc-950">{{ business.email }}</a></dd>
          </div>
        </dl>
      </div>

      <div class="lg:col-span-3">
        <div v-if="sent" class="mb-8 rounded-2xl bg-brand-50 p-6 ring-1 ring-brand-600/20" role="status">
          <p class="text-base/7 font-semibold text-brand-900">Thanks, your message has been sent.</p>
          <p class="mt-1 text-base/7 text-brand-900/80 sm:text-sm/6">We will get back to you as soon as possible.</p>
        </div>
        <form
          name="contact"
          method="POST"
          action="/contact?sent"
          data-netlify="true"
          netlify-honeypot="website-field"
          class="rounded-3xl bg-zinc-50 p-6 ring-1 ring-zinc-950/5 sm:p-10"
        >
          <input type="hidden" name="form-name" value="contact" />
          <p class="hidden">
            <label>Not for humans: <input name="website-field" tabindex="-1" autocomplete="off" /></label>
          </p>
          <h2 class="text-lg/7 font-semibold text-zinc-950">Send us a message</h2>
          <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-2">
            <div>
              <label for="first-name" class="block text-sm/6 font-medium text-zinc-950">First name</label>
              <input id="first-name" name="first-name" type="text" autocomplete="given-name" required :class="['mt-2', inputClass]" />
            </div>
            <div>
              <label for="last-name" class="block text-sm/6 font-medium text-zinc-950">Last name</label>
              <input id="last-name" name="last-name" type="text" autocomplete="family-name" required :class="['mt-2', inputClass]" />
            </div>
            <div>
              <label for="email" class="block text-sm/6 font-medium text-zinc-950">Email</label>
              <input id="email" name="email" type="email" autocomplete="email" required :class="['mt-2', inputClass]" />
            </div>
            <div>
              <label for="phone" class="block text-sm/6 font-medium text-zinc-950">Phone <span class="font-normal text-zinc-500">(optional)</span></label>
              <input id="phone" name="phone" type="tel" autocomplete="tel" :class="['mt-2', inputClass]" />
            </div>
            <div class="sm:col-span-2">
              <label for="subject" class="block text-sm/6 font-medium text-zinc-950">Subject</label>
              <input id="subject" name="subject" type="text" required :class="['mt-2', inputClass]" />
            </div>
            <div class="sm:col-span-2">
              <label for="message" class="block text-sm/6 font-medium text-zinc-950">Message</label>
              <textarea
                id="message"
                name="message"
                rows="5"
                required
                aria-describedby="message-help"
                :class="['mt-2', inputClass]"
              ></textarea>
              <p id="message-help" class="mt-2 text-sm/6 text-zinc-500">Sizes, quantities, colours, wording and where the signs will be used.</p>
            </div>
          </div>
          <div class="mt-8 flex justify-end">
            <button type="submit" class="rounded-full bg-brand-500 px-4 py-2.5 text-base/7 font-semibold text-zinc-950 hover:bg-brand-400 sm:text-sm/6">Send message</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</template>
