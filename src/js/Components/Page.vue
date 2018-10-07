<template>
    <div>
        <div class="position-ref full-height">
            <div class="content">
                <h1 class="link welcome">Jitesoft</h1>
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
  export default Vue.component('page', {
    name: 'page',
    components: {
      PageEntry,
      MainMenu
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
      }
    }
  });
</script>
