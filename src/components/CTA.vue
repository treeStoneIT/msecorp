<template>
  <!-- Featured section -->
  <section aria-labelledby="cause-heading">
    <div class="relative bg-gray-900 py-32 px-6 sm:py-40 sm:px-12 lg:px-16">
      <div class="absolute inset-0 overflow-hidden">
        <img src="/images/stock-photo-laser-engraving-machine-and-engineer-with-touchpad-near-by-626712152.jpg" alt=""
             class="w-full h-full object-center object-cover"/>
      </div>
      <div aria-hidden="true" class="absolute inset-0 bg-gray-900 bg-opacity-50"/>
      <div class="relative max-w-3xl mx-auto flex flex-col items-center text-center">
        <h2 id="cause-heading" class="text-3xl tracking-wider text-white sm:text-4xl">
          Custom Designs Are Our Specialty
        </h2>
        <p class="mt-3 text-xl text-white">
          To learn how Modern Sign and Engraving can help your company <br class="hidden sm:inline-block">
          by manufacturing customized, engraved labels <br class="hidden sm:inline-block">
          or assisting with unique signage needs
        </p>
        <a href="/contact"
           class="mt-8 w-full block bg-primary border border-transparent rounded-md py-3 px-8 text-base font-medium text-gray-900 hover:bg-secondary sm:w-auto hover:cursor-pointer">Contact Us</a>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "cta.vue"
}
</script>

<style scoped>

</style>