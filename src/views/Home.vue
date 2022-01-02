<script>

const products = [
  { name: 'Braille (ADA Signs)', description: 'Braille signs is essential for individuals with visual impairments.' },
  { name: 'Safety Signs', description: 'Improve safety by clearly marking control panels and valves.' },
  { name: 'Sliding Signs', description: 'Sliding signs provide current status of the room in a quick and clear fashion.' },
  { name: 'Room ID Signs', description: 'Signs around your facility provides a professional finish and avoids possible confusion.' },
  { name: 'Restroom', description: 'Symbols depicting clearly what the washroom specifications are.' },
  { name: 'Directional Signs', description: 'With arrows and words showing you where to go much confusion can be avoided.' },
]

import CTA from '@/components/CTA.vue'

export default {
  components: {CTA},
  setup() {
    return {
      products,
    }
  },
}
</script>

<template>

  <main>

    <div class="bg-white">
      <div class="max-w-2xl mx-auto py-24 px-4 grid items-center grid-cols-1 gap-y-16 gap-x-8 sm:px-6 sm:py-32 lg:max-w-7xl lg:px-8 lg:grid-cols-2">
        <div>
          <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Our Products</h2>
          <p class="mt-4 text-gray-500">This way of labeling anything your facility is cost effective and leads to a very professional, polished look.</p>

          <dl class="mt-16 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 sm:gap-y-16 lg:gap-x-8">
            <div v-for="product in products" :key="product.name" class="border-t border-gray-200 pt-4">
              <dt class="font-medium text-gray-900">{{ product.name }}</dt>
              <dd class="mt-2 text-sm text-gray-500">{{ product.description }}</dd>
            </div>
          </dl>
        </div>
        <div class="grid grid-cols-2 grid-rows-2 gap-4 sm:gap-6 lg:gap-8">
          <img src="/images/square-1.jpg" alt="" class="bg-gray-100 rounded-lg" />
          <img src="/images/stock-photo-clear-nameplate-on-the-door-with-lock-room-for-text-for-name-and-number-conceptual-photo-1592342749.jpg" class="bg-gray-100 rounded-lg" alt="" />
          <img src="/images/stock-photo-computer-services-office-385846015.jpg" class="bg-gray-100 rounded-lg" alt="" />
          <img src="/images/stock-photo-sign-for-wheelchair-accessible-entrance-to-building-1670096539.jpg" alt="
" class="bg-gray-100 rounded-lg" />
        </div>
      </div>
    </div>


    <CTA/>


  </main>

</template>