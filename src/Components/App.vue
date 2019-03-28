<template>
  <component :is="layout">
    <router-view></router-view>
  </component>
</template>

<script>
import Vue from 'vue';

export default Vue.component('App', {
  computed: {
    layout () {
      return 'default-layout';
    }
  }
});
</script>
