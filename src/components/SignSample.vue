<script setup>
import { computed } from 'vue'

const props = defineProps({
  sample: { type: Object, required: true },
})

const faces = {
  black: 'bg-zinc-900 text-white',
  red: 'bg-red-700 text-white',
  blue: 'bg-blue-800 text-white',
  green: 'bg-green-700 text-white',
  white: 'bg-white text-zinc-900',
  whiteRed: 'bg-white text-red-700',
  yellow: 'bg-yellow-400 text-zinc-950',
  brushed:
    'bg-[repeating-linear-gradient(90deg,rgb(255_255_255/0.35)_0_1px,transparent_1px_3px),linear-gradient(180deg,#e4e4e7,#a1a1aa)] text-zinc-950',
}

const letterDots = {
  a: '1', b: '12', c: '14', d: '145', e: '15', f: '124', g: '1245', h: '125', i: '24', j: '245',
  k: '13', l: '123', m: '134', n: '1345', o: '135', p: '1234', q: '12345', r: '1235', s: '234', t: '2345',
  u: '136', v: '1236', w: '2456', x: '1346', y: '13456', z: '1356',
}
const digitLetters = '0123456789'.split('').reduce((map, d, i) => ({ ...map, [d]: 'jabcdefghi'[i] }), {})
const dotPos = { 1: [0, 0], 2: [0, 1], 3: [0, 2], 4: [1, 0], 5: [1, 1], 6: [1, 2] }

const brailleCells = computed(() => {
  const cells = []
  let inNumber = false
  for (const ch of (props.sample.braille || '').toLowerCase()) {
    if (/[0-9]/.test(ch)) {
      if (!inNumber) cells.push('3456')
      inNumber = true
      cells.push(letterDots[digitLetters[ch]])
    } else {
      inNumber = false
      cells.push(ch === ' ' ? '' : letterDots[ch] || '')
    }
  }
  return cells
})

const cellWidth = 9
</script>

<template>
  <div
    class="w-full max-w-72 rounded-md px-4 py-4 text-center uppercase shadow-[inset_0_1px_0_rgb(255_255_255/0.25),0_6px_14px_-4px_rgb(0_0_0/0.35)] ring-1 ring-black/10"
    :class="faces[sample.face]"
    :aria-label="sample.lines.join(' ')"
    role="img"
  >
    <div v-if="sample.icons" class="mb-2 flex items-end justify-center gap-x-3" aria-hidden="true">
      <svg v-for="(icon, index) in sample.icons" :key="index" :viewBox="icon.startsWith('arrow') ? '0 0 24 24' : '0 0 32 48'" class="fill-current" :class="icon.startsWith('arrow') ? 'size-8' : 'h-12 w-8'">
        <template v-if="icon === 'man'">
          <circle cx="16" cy="5" r="4.5" />
          <rect x="8" y="11" width="16" height="17" rx="3" />
          <rect x="9" y="26" width="6" height="21" rx="2" />
          <rect x="17" y="26" width="6" height="21" rx="2" />
        </template>
        <template v-else-if="icon === 'woman'">
          <circle cx="16" cy="5" r="4.5" />
          <path d="M11 11h10l7 22H4z" />
          <rect x="10" y="31" width="5" height="16" rx="2" />
          <rect x="17" y="31" width="5" height="16" rx="2" />
        </template>
        <template v-else-if="icon === 'accessible'">
          <circle cx="12" cy="6" r="4.5" />
          <path d="M12 13v14h11l5 14" fill="none" stroke="currentColor" stroke-width="4.5" stroke-linecap="round" stroke-linejoin="round" />
          <path d="M7 22a12 12 0 1 0 16 16" fill="none" stroke="currentColor" stroke-width="3.5" stroke-linecap="round" />
        </template>
        <template v-else-if="icon === 'child'">
          <circle cx="16" cy="18" r="4" />
          <rect x="10" y="24" width="12" height="12" rx="3" />
          <rect x="11" y="34" width="4.5" height="13" rx="2" />
          <rect x="16.5" y="34" width="4.5" height="13" rx="2" />
        </template>
        <template v-else-if="icon === 'bolt'">
          <path d="M16 2 31 46H1z" fill="none" stroke="currentColor" stroke-width="3" stroke-linejoin="round" />
          <path d="M18 14l-7 15h5l-2 12 8-17h-5z" />
        </template>
        <path v-else-if="icon === 'arrow-right'" d="M3 10.5h12.5L11 6l2-2 8 8-8 8-2-2 4.5-4.5H3z" />
        <path v-else-if="icon === 'arrow-left'" d="M21 10.5H8.5L13 6l-2-2-8 8 8 8 2-2-4.5-4.5H21z" />
        <path v-else-if="icon === 'arrow-up'" d="M10.5 21V8.5L6 13l-2-2 8-8 8 8-2 2-4.5-4.5V21z" />
      </svg>
    </div>
    <p
      v-for="(line, index) in sample.lines"
      :key="index"
      class="leading-tight font-semibold tracking-wide"
      :class="index === 0 ? (sample.big ? 'text-4xl tabular-nums' : 'text-lg') : 'mt-1 text-xs'"
    >
      {{ line }}
    </p>
    <svg
      v-if="brailleCells.length"
      :viewBox="`0 0 ${brailleCells.length * cellWidth} 13`"
      :width="brailleCells.length * cellWidth"
      height="13"
      class="mx-auto mt-3 max-w-full fill-current opacity-80"
      aria-hidden="true"
    >
      <template v-for="(cell, cellIndex) in brailleCells" :key="cellIndex">
        <circle
          v-for="dot in cell.split('')"
          :key="dot"
          :cx="cellIndex * cellWidth + 2 + dotPos[dot][0] * 4"
          :cy="2 + dotPos[dot][1] * 4.5"
          r="1.4"
        />
      </template>
    </svg>
    <div v-if="sample.slider" class="mt-3 flex overflow-hidden rounded-sm bg-zinc-400/60 p-0.5 text-[0.625rem]/5 font-semibold tracking-wide" aria-hidden="true">
      <span class="flex-1 rounded-sm bg-green-700 text-white">{{ sample.slider[0] }}</span>
      <span class="flex-1 text-zinc-800/70">{{ sample.slider[1] }}</span>
    </div>
  </div>
</template>
