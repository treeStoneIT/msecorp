import HomePage from './views/HomePage.vue'

export const routes = [
  {
    path: '/',
    name: 'home',
    component: HomePage,
  },
  {
    path: '/about',
    name: 'about',
    component: () => import('./views/AboutPage.vue'),
  },
  {
    path: '/products',
    name: 'products',
    component: () => import('./views/ProductsPage.vue'),
  },
  {
    path: '/contact',
    name: 'contact',
    component: () => import('./views/ContactPage.vue'),
  },
  {
    path: '/lamacoid-labels',
    name: 'lamacoid-labels',
    component: () => import('./views/ProductPage.vue'),
    props: { slug: 'lamacoid-labels' },
  },
  {
    path: '/braille-signs',
    name: 'braille-signs',
    component: () => import('./views/ProductPage.vue'),
    props: { slug: 'braille-signs' },
  },
  {
    path: '/safety-signs',
    name: 'safety-signs',
    component: () => import('./views/ProductPage.vue'),
    props: { slug: 'safety-signs' },
  },
  {
    path: '/sliding-signs',
    name: 'sliding-signs',
    component: () => import('./views/ProductPage.vue'),
    props: { slug: 'sliding-signs' },
  },
  {
    path: '/washroom-signs',
    name: 'washroom-signs',
    component: () => import('./views/ProductPage.vue'),
    props: { slug: 'washroom-signs' },
  },
  {
    path: '/directional-signs',
    name: 'directional-signs',
    component: () => import('./views/ProductPage.vue'),
    props: { slug: 'directional-signs' },
  },
  {
    path: '/custom-engraving',
    name: 'custom-engraving',
    component: () => import('./views/ProductPage.vue'),
    props: { slug: 'custom-engraving' },
  },
  {
    path: '/404',
    name: 'not-found',
    component: () => import('./views/NotFoundPage.vue'),
  },
]
