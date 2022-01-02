<script>

import CTA from '@/components/CTA.vue'

const products = [
  {
    name: 'Electrical & Industrial applications',
    description:
        'Improve safety by clearly marking control panels and valves. ' +
        '<br />Common Uses:' +
        '<ul class="list-disc list-inside mt-4"><li>Electrical labeling</li><li>Control Panel Markings</li><li>Transformer nameplates</li></ul>',
    imageSrc: 'images/stock-photo-electrical-control-panel-in-factory-control-panel-786831169.jpeg',
    imageAlt: '',
  },
  {
    name: 'Braille (ADA Signs) ',
    description:
        'Braille signs is essential for individuals with visual impairments. Our braille signs enable those who are visually impaired to be just as informed as everyone else in your facility. The raised dots represent everything from alphabet to punctuation marks to ensure every individual has an equal chance of getting around easily. ' +
        '<br />Commonly Used for:' +
        '<ul class="list-disc list-inside mt-4"><li>Washroom</li><li>Stairs</li><li>Exit</li><li>Elavator</li></ul>',
    imageSrc: 'images/stock-photo-a-person-reading-in-braille-697739977.jpg',
    imageAlt: '',
  },
  {
    name: 'Sliding Signs',
    description:
        'Sliding signs provide current status of the room in a quick and clear fashion. ' +
        '<br />Commonly Used for:' +
        '<ul class="list-disc list-inside mt-4"><li>Occupied/Vacant</li><li>In Session/Available</li><li>Open/Closed</li><li>On Duty/Off Duty</li></ul>',
    imageSrc: 'images/stock-photo-sliding-door-signage-of-a-counselling-room-available-and-unavailable-indicator-aluminium-sign-2024852387.jpg',
    imageAlt: '',
  },
  {
    name: 'Restroom',
    description:
        'symbols depicting clearly what the washroom specifications are. Common Types:' +
        '<ul class="list-disc list-inside mt-4"><li>Male</li><li>Female</li><li>Male/Female</li><li>Handicapped</li><li>MF HC</li></ul>',
    imageSrc: 'images/stock-vector-different-icons-for-restroom-men-woman-people-with-disability-shower-child-vector-signs-1934378597.jpg',
    imageAlt: '',
  },
  {
    name: 'Directional Signs',
    description:
        'With arrows and words showing you where to go much confusion can be avoided.' +
        '<p class="mt-2"><strong>Room ID Signs</strong> -  Signs around your facility provides a professional finish and avoids possible confusion. Including room signs, stairwells, corridors, turns in a hallway these signs will surely provide staff and visitors more efficiency.</p>' +
        '<p class="mt-2"><strong>Stairwell Signs</strong> - A number on each floor is required for people to safely and easily get around your facility.</p>',
    imageSrc: 'images/direction-signs (2).jpg',
    imageAlt: '',
  },
]


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
      <div class="bg-warm-gray-50">
        <div class="max-w-2xl mx-auto py-20 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
          <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-5xl">Our Product Lines</h2>
            <p class="mt-4 text-gray-500">Our customizable options can be the ideal solution for your companies signs. From shape, size, and color you can customize the signs so its perfectly suited for the messages you need to relay. Lamacoids can clearly communicate information for anything in your facility from identification tags, electrical panels, legend plates, machine panels, cable tags, warning signs, valve tags, nameplates and more.</p>
          </div>

          <div class="mt-16 space-y-16">
            <div v-for="(feature, productIdx) in products" :key="feature.name" class="flex flex-col-reverse lg:grid lg:grid-cols-12 lg:gap-x-8 lg:items-center">
              <div :class="[productIdx % 2 === 0 ? 'lg:col-start-1' : 'lg:col-start-8 xl:col-start-9', 'mt-6 lg:mt-0 lg:row-start-1 lg:col-span-5 xl:col-span-4']">
                <h3 class="text-lg font-medium text-gray-900">{{ feature.name }}</h3>
                <p class="mt-2 text-sm text-gray-500" v-html="feature.description"></p>
              </div>
              <div :class="[productIdx % 2 === 0 ? 'lg:col-start-6 xl:col-start-5' : 'lg:col-start-1', 'flex-auto lg:row-start-1 lg:col-span-7 xl:col-span-8']">
                <div class="aspect-w-5 aspect-h-2 rounded-lg bg-gray-100 overflow-hidden">
                  <img :src="feature.imageSrc" :alt="feature.imageAlt" class="object-center object-cover" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <CTA/>
  </main>

</template>
