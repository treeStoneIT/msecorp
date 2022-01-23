<script>

import CTA from '@/components/CTA.vue'

export default {
  components: {CTA},
}
</script>

<template>
  <main class="bg-warm-gray-50">
    <div class="relative py-20">
      <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:gap-24 lg:items-start">
        <div class="relative sm:py-16 lg:py-0">
          <div aria-hidden="true" class="hidden sm:block lg:absolute lg:inset-y-0 lg:right-0 lg:w-screen">
            <div class="absolute inset-y-0 right-1/2 w-full bg-gray-50 rounded-r-3xl lg:right-72"></div>
            <svg class="absolute top-8 left-1/2 -ml-3 lg:-right-8 lg:left-auto lg:top-12" width="404" height="392"
                 fill="none" viewBox="0 0 404 392">
              <defs>
                <pattern id="02f20b47-fd69-4224-a62a-4c9de5c763f7" x="0" y="0" width="20" height="20"
                         patternUnits="userSpaceOnUse">
                  <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"></rect>
                </pattern>
              </defs>
              <rect width="404" height="392" fill="url(#02f20b47-fd69-4224-a62a-4c9de5c763f7)"></rect>
            </svg>
          </div>
          <div class="relative mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-0 lg:max-w-none lg:py-20">
            <!-- Testimonial card-->
            <div class="relative pt-64 pb-10 rounded-2xl shadow-xl overflow-hidden">
              <img class="absolute inset-0 h-full w-full object-cover" src="/images/engrave-lasers.jpg" alt="">
              <!--            <div class="absolute inset-0 bg-primary mix-blend-multiply"></div>-->
              <div class="absolute inset-0 bg-primary opacity-40"></div>
              <!--            <div class="absolute inset-0 bg-gradient-to-t from-rose-600 via-rose-600 opacity-90"></div>-->
            </div>
          </div>
        </div>

        <div class="relative mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-0">
          <!-- Content area -->
          <div class="pt-12 sm:pt-16 lg:pt-20">
            <h2 class="text-3xl text-gray-900 font-extrabold tracking-tight sm:text-4xl">
              Modern Sign & Engraving Corp
            </h2>
            <div class="mt-6 text-gray-500 space-y-6">
              <p class="prose prose-indigo">Modern was founded in 1980, and has since then been serving hundreds of
                businesses over the years. We’ve serviced a large range of companies, from builders to suppliers, with a
                variety of different signs for various uses. We’re known for our personal customer service, reliability
                and top quality signs that we have provided our customers for decades. Our high tech machines can
                customize anything that you need to improve your business or facility professionalism and efficiency. We
                have a large, varied selection of services that include signs in many shapes and sizes, enabling clear
                communication that your facility needs.</p>
            </div>
          </div>

        </div>
      </div>
    </div>
    <CTA/>
  </main>

</template>
