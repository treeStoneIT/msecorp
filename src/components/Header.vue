<template>
  <!-- Mobile menu -->
  <TransitionRoot as="template" :show="open">
    <Dialog as="div" class="fixed inset-0 flex z-40 lg:hidden" @close="open = false">
      <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0"
                       enter-to="opacity-100" leave="transition-opacity ease-linear duration-300"
                       leave-from="opacity-100" leave-to="opacity-0">
        <DialogOverlay class="fixed inset-0 bg-black bg-opacity-25"/>
      </TransitionChild>

      <TransitionChild as="template" enter="transition ease-in-out duration-300 transform"
                       enter-from="-translate-x-full" enter-to="translate-x-0"
                       leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0"
                       leave-to="-translate-x-full">
        <div class="relative max-w-xs w-full bg-white shadow-xl pb-12 flex flex-col overflow-y-auto">
          <div class="px-4 pt-5 pb-2 flex">
            <button type="button" class="-m-2 p-2 rounded-md inline-flex items-center justify-center text-gray-400"
                    @click="open = false">
              <span class="sr-only">Close menu</span>
              <XIcon class="h-6 w-6" aria-hidden="true"/>
            </button>
          </div>

          <div class="border-t border-gray-200 py-6 px-4 space-y-6">
            <div v-for="page in navigation.pages" :key="page.name" class="flow-root">
              <a :href="page.href" class="-m-2 p-2 block font-medium text-gray-900">{{ page.name }}</a>
            </div>
          </div>
        </div>
      </TransitionChild>
    </Dialog>
  </TransitionRoot>

  <header class="relative overflow-hidden">
    <!-- Top navigation -->
    <nav aria-label="Top" class="relative z-20 bg-white bg-opacity-90 backdrop-filter backdrop-blur-xl">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="h-20 py-2 flex items-center">
          <button type="button" class="bg-white p-2 rounded-md text-gray-400 lg:hidden" @click="open = true">
            <span class="sr-only">Open menu</span>
            <MenuIcon class="h-6 w-6" aria-hidden="true"/>
          </button>

          <!-- Logo -->
          <div class="ml-4 flex lg:ml-0">
            <a class="hover:cursor-pointer" href="/">
              <span class="sr-only">Modern Sign & Engraving Corp</span>
              <img src="/images/msecorp-logo-cropped.svg" class="h-12 w-auto" alt=""/>
            </a>
          </div>

          <!-- Flyout menus -->
          <div class="hidden lg:ml-8 lg:block lg:self-stretch">
            <div class="h-full flex space-x-8 uppercase px-4">
              <a v-for="page in navigation.pages" :key="page.name" :href="page.href"

                 class="border-transparent flex items-center font-medium text-gray-500 hover:text-primary hover:border-secondary border-b-2 hover:cursor-pointer">{{ page.name }}</a>
            </div>
          </div>

        </div>
      </div>
    </nav>

    <HomeHero v-if="isHome" />

  </header>
</template>

<script>
import {ref} from 'vue'
import HomeHero from "@/components/HomeHero.vue";

import {
  TransitionChild,
  TransitionRoot,
  DialogOverlay,
  Dialog,
} from '@headlessui/vue'
import {MenuIcon, XIcon} from '@heroicons/vue/outline'

const navigation = {
  pages: [
    {name: 'About', href: '/about'},
    {name: 'Products', href: '/products'},
    {name: 'Contact Us', href: '/contact'},
  ],
}

export default {
  components: {
    HomeHero,
    TransitionChild,
    TransitionRoot,
    DialogOverlay,
    Dialog,
    MenuIcon,
    XIcon,
  },

  setup() {
    const open = ref(false)

    return {
      navigation,
      open
    }
  },

  computed: {
    isHome() {
      return this.$route.name === 'Home'
    }
  }
}

</script>

<style scoped>

</style>