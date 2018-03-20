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

            <div id="legal-cookies" class="cookie-consent hidden">
                <p>We use cookies to personalise content and analyse our traffic.
                    We also share information about your use of the site with our analytics partner (google) who may combine
                    it with other information you've provided to them or they have collected from your use of their services.</p>
                <button name="accept">Agree</button>
            </div>
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
          console.log('Now: ' + this.current);
      }
    }
  });
</script>
