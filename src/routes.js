import Home from './views/Home.vue'
import About from './views/About.vue'
import Products from './views/Products.vue'
import Contact from './views/Contact.vue'
import NotFound from './views/NotFound.vue'


/** @type {import('vue-router').RouterOptions['routes']} */
export const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    meta: {
      title: 'Modern Sign & Engraving Corp | Engraved Lamacoid and ADA Signs',
      metaTags: [
        {
          name: 'description',
          content: 'Custom laser engraved lamacoids of all kinds for commercial, electrical and industrial applications.'
        },
        {
          property: 'og:description',
          content: 'Custom laser engraved lamacoids of all kinds for commercial, electrical and industrial applications.'
        }
      ]
    }
  },
  {
    path: '/about',
    name: 'About',
    meta: {
      title: 'About Modern Sign & Engraving Corp',
      metaTags: [
        {
          name: 'description',
          content: 'Custom laser engraved lamacoids of all kinds for commercial, electrical and industrial applications.'
        },
        {
          property: 'og:description',
          content: 'Custom laser engraved lamacoids of all kinds for commercial, electrical and industrial applications.'
        }
      ]
    },
    component: About,
  },
  {
    path: '/products',
    name: 'Products',
    meta: {
      title: 'Signs | Modern Sign & Engraving Corp ',
      metaTags: [
        {
          name: 'description',
          content: 'Electrical & Industrial Applications, Braille (ADA Signs), Sliding Signs, Restroom Signs, Directional Signs'
        },
        {
          property: 'og:description',
          content: 'Electrical & Industrial Applications, Braille (ADA Signs), Sliding Signs, Restroom Signs, Directional Signs'
        }
      ]
    },
    component: Products,
  },
  {
    path: '/contact',
    name: 'Contact',
    meta: {
      title: 'Modern Sign & Engraving Corp Located In Toronto',
      metaTags: [
        {
          name: 'description',
          content: 'Thank you for your interest in Modern Sign & Engraving. Please contact us through one of the methods indicated below, and we will get back to you as soon as possible.'
        },
        {
          property: 'og:description',
          content: 'Thank you for your interest in Modern Sign & Engraving. Please contact us through one of the methods indicated below, and we will get back to you as soon as possible.'
        }
      ]
    },
    component: Contact,
  },
  {
    path: '/:path(.*)',
    component: NotFound,
    meta: {
      title: 'Page Not Found'
    }
  },
]
