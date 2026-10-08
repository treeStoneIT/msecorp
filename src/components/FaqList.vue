<script setup>
defineProps({ faqs: { type: Array, required: true } })
</script>

<template>
  <dl class="divide-y divide-zinc-950/5 border-y border-zinc-950/5">
    <div v-for="faq in faqs" :key="faq.q" class="py-6">
      <dt class="text-base/7 font-semibold text-zinc-950">{{ faq.q }}</dt>
      <dd class="mt-2 max-w-[65ch] text-base/7 text-pretty text-zinc-600">{{ faq.a }}</dd>
    </div>
  </dl>
</template>
