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
]
