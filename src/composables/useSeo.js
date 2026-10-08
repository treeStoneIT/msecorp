import { useHead } from '@unhead/vue'
import { business } from '../data/business.js'

const BASE_URL = 'https://modernsign.ca'
const DEFAULT_IMAGE = '/images/lamacoid-laser-engraving-machine-1280.webp'

export function useSeo({ title, description, path, image, jsonLd = [] }) {
  const canonical = BASE_URL + path
  const ogImage = image
    ? image.startsWith('http')
      ? image
      : BASE_URL + image
    : BASE_URL + DEFAULT_IMAGE

  useHead({
    title,
    meta: [
      { name: 'description', content: description },
      { property: 'og:type', content: 'website' },
      { property: 'og:site_name', content: business.name },
      { property: 'og:title', content: title },
      { property: 'og:description', content: description },
      { property: 'og:url', content: canonical },
      { property: 'og:image', content: ogImage },
      { name: 'twitter:card', content: 'summary_large_image' },
    ],
    link: [{ key: 'canonical', rel: 'canonical', href: canonical }],
    script: jsonLd.map((data) => ({
      type: 'application/ld+json',
      innerHTML: JSON.stringify(data),
    })),
  })
}
