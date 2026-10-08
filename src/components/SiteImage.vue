<script setup>
import { computed } from 'vue'
import manifest from '@/data/images.json'

const props = defineProps({
  slug: { type: String, required: true },
  alt: { type: String, default: '' },
  sizes: { type: String, default: '100vw' },
  eager: { type: Boolean, default: false },
})

const entry = computed(() => manifest[props.slug])
const srcset = computed(() => entry.value.widths.map((w) => `/images/${props.slug}-${w}.webp ${w}w`).join(', '))
const src = computed(() => {
  const widths = entry.value.widths
  return `/images/${props.slug}-${widths.includes(1280) ? 1280 : widths.at(-1)}.webp`
})
</script>

<template>
  <img
    :src="src"
    :srcset="srcset"
    :sizes="sizes"
    :alt="alt"
    :width="entry.width"
    :height="entry.height"
    :loading="eager ? 'eager' : 'lazy'"
    :fetchpriority="eager ? 'high' : undefined"
    decoding="async"
  />
</template>
