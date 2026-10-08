import { business } from '../data/business.js'

const areaServed = [
  { '@type': 'City', name: 'Toronto' },
  { '@type': 'AdministrativeArea', name: 'Greater Toronto Area' },
  { '@type': 'AdministrativeArea', name: 'Ontario' },
]

export function localBusinessSchema() {
  return {
    '@context': 'https://schema.org',
    '@type': 'LocalBusiness',
    '@id': `${business.url}/#business`,
    name: business.name,
    url: business.url,
    logo: business.url + business.logo,
    image: `${business.url}/images/lamacoid-laser-engraving-machine-1280.webp`,
    telephone: business.phone,
    email: business.email,
    foundingDate: String(business.foundingYear),
    address: {
      '@type': 'PostalAddress',
      streetAddress: business.address.street,
      addressLocality: business.address.city,
      addressRegion: business.address.region,
      postalCode: business.address.postalCode,
      addressCountry: business.address.country,
    },
    areaServed,
  }
}

export function breadcrumbSchema(items) {
  return {
    '@context': 'https://schema.org',
    '@type': 'BreadcrumbList',
    itemListElement: items.map((item, i) => ({
      '@type': 'ListItem',
      position: i + 1,
      name: item.name,
      item: business.url + item.path,
    })),
  }
}

export function faqSchema(faqs) {
  return {
    '@context': 'https://schema.org',
    '@type': 'FAQPage',
    mainEntity: faqs.map((faq) => ({
      '@type': 'Question',
      name: faq.q,
      acceptedAnswer: {
        '@type': 'Answer',
        text: faq.a.replace(/<[^>]*>/g, ''),
      },
    })),
  }
}

export function serviceSchema({ name, description, path, image }) {
  return {
    '@context': 'https://schema.org',
    '@type': 'Service',
    name,
    description,
    url: business.url + path,
    image: image.startsWith('http') ? image : business.url + image,
    serviceType: name,
    provider: { '@id': `${business.url}/#business` },
    areaServed,
  }
}
