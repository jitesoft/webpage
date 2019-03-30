<template>
  <div>
    <HeaderSection />
    <div class="grid">
      <div class="spacer">
          <SiteNav class=".site-nav" />
      </div>
      <div class="content">
        <slot />
      </div>
      <div class="spacer"></div>
    </div>
    <FooterSection />
  </div>
</template>
<script>
import FooterSection from '@/Partials/FooterSection';
import HeaderSection from '@/Partials/HeaderSection';

export default {
  components: {
    HeaderSection,
    FooterSection
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
    justify-content: space-between;
  }

  .content {
    width: 60%;
  }

  .spacer {
    width: 15%;
    min-width: 3.5em;
  }

  .row {
    width: 95%;
  }

</style>
