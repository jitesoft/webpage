<template>
  <div>
    <Header />
    <div class="grid">
      <div class="spacer">
          <SiteNav class=".site-nav" />
      </div>
      <div class="content">
        <slot />
      </div>
      <div class="spacer"></div>
    </div>
    <Footer />
  </div>
</template>
<script>
import Footer from '@/Partials/Footer';
import Header from '@/Partials/Header';

export default {
  components: {
    Header,
    Footer
  }
};
</script>

<style scoped lang="scss">
  $small: "(width <= 767px)";
  $medium: "(width >= 768px) and (width <= 960px)";
  $large: "(width >= 1200px)";

  .site-nav {
    display: none;
    @media($small) {
      display: flex;
    }

  }

  .grid {
    display: flex;
    width: 98%;
    flex-direction: row;
    min-height: 75vh;
  }

  .content {
    width: 60%;
  }

  .spacer {
    width: 15%;
  }

  .row {
    width: 95%;
  }
</style>
