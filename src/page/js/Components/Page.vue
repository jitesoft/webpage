<template>
    <div>
        <div class="position-ref full-height">
            <div class="content">
                <Title/>
                <PageEntry :current="current" />
            </div>
        </div>
        <footer>
            <MainMenu @click="togglePage" />
        </footer>
    </div>
</template>

<script>
  import PageEntry from './PageEntry';
  import MainMenu from './Menu';
  import Title from './Title';
  export default Vue.component('page', {
    name: 'page',
    components: {
      PageEntry,
      MainMenu,
      Title
    },
    data: function () {
      return {
        current: 'home',
      }
    },
    methods: {
      togglePage: function (page) {
        console.log(page);
          this.current = page;
          console.log('Now: ' + this.current);
      }
    }
  });
</script>
