<script setup>
import { useHead } from '@unhead/vue'
import { useSeo } from '@/composables/useSeo.js'

useSeo({
  title: 'Page not found | Modern Sign & Engraving Corp',
  description: 'The page you are looking for could not be found.',
  path: '/404',
})

useHead({
  meta: [{ name: 'robots', content: 'noindex' }],
})
</script>

<template>
  <h1>Page not found</h1>
</template>
