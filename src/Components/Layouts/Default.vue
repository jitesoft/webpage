<template>
  <div>
    <HeaderSection />
    <div class="grid">
      <div class="column col1">
          <SiteNav />
      </div>
      <div class="column col4">
        <slot />
      </div>
      <div class="column col1"></div>
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
@import 'src/styles/vars.scss';

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

.column {
  &.col1 {
    width: 15%;
    min-width: 3.5em;
  }

  &.col4 {
    width: 60%;
  }
}

.row {
  width: 95%;
}

</style>
