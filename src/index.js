import onLoad from '@jitesoft/on-load';
import Vue from 'vue';
import VueRouter from 'vue-router';
import App from '@/App';
import DefaultLayout from '@/Layouts/Default';
import 'styles/global.scss';
// Favicons and OG image.
import 'img/favicon-16x16.png';
import 'img/favicon-32x32.png';
import 'img/favicon-64x64.png';
import 'img/favicon-96x96.png';
import 'img/favicon.ico';
import 'img/og-image.png';
import 'img/Jitesoft.png';
import 'img/Jitesoft-scaled.png';

Vue.use(VueRouter);
Vue.component('default-layout', DefaultLayout);

onLoad.then(() => {
  const router = new VueRouter({
    mode: 'history',
    routes: [
      { path: '/', component: () => import('src/Components/Pages/Home') },
      { path: '/values', component: () => import('src/Components/Pages/CoreValues') },
      { path: '/projects', component: () => import('src/Components/Pages/Projects') },
      { path: '/contact', component: () => import('src/Components/Pages/Contact') }
    ]
  });

  // Set up layouts.
  new Vue({
    render: h => h(App),
    router
  }).$mount('#root');
}).catch((error) => {
  console.error(error);
});
