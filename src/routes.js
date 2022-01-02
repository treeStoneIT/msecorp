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
    meta: { title: 'Home' }
  },
  {
    path: '/about',
    name: 'About',
    meta: { title: 'About' },
    component: About,
  },
  {
    path: '/products',
    name: 'Products',
    meta: { title: 'Products' },
    component: Products,
  },
  {
    path: '/contact',
    name: 'Contact',
    meta: { title: 'Contact Us' },
    component: Contact,
  },
  { path: '/:path(.*)', component: NotFound },
]
