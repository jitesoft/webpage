import onLoad from '@jitesoft/on-load';
import Vue from 'vue';
import VueRouter from 'vue-router';
import App from '@/App';

import DefaultLayout from '@/Layouts/Default';

Vue.use(VueRouter);
Vue.component('default-layout', DefaultLayout);

onLoad.then(() => {
  const router = new VueRouter({
    mode: 'history',
    routes: [
      { path: '/', component: () => import('src/Components/Pages/Home') }
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
