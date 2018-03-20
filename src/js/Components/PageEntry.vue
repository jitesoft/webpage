<template>
    <div :current="current">
        <h2>{{caption}}</h2>
        <p v-html="text"></p>
    </div>
</template>

<script>
  import PageData from '../Data/texts';
  export default Vue.component('page-entry', {
    name: 'page-entry',
    props: {
      current: String
    },
    computed: {
      text: function () {
        return PageData[this.current].text;
      },
      caption: function () {
        return PageData[this.current].caption;
      }
    }
  });
</script>
