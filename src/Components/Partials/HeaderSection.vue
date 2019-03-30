<template>
    <header>
        <div class="row">
            <div class="title">
                <router-link to="/"><img :src="logo"></router-link>
                <h1>Jitesoft</h1>
            </div>
            <SocialNav />
        </div>
        <div class="row site-nav-row">
            <SiteNav />
        </div>
    </header>
</template>

<script>
import Vue from 'vue';
import Logo from 'src/img/Jitesoft.svg';
import SocialNav from '@/Partials/SocialNav';
import SiteNav from '@/Partials/SiteNav';

export default Vue.component('HeaderSection', {
  components: {
    SocialNav,
    SiteNav
  },
  data () {
    return {
      logo: Logo
    };
  }
});
</script>

<style scoped lang="scss">
@import 'src/styles/vars.scss';

.row {
    width: 95vw;
    display: flex;
    flex-direction: row;
    justify-content: space-between;

    .title {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
    }
}

.site-nav-row {
    @media($small) {
        display: none;
    }
}

img {
    width: 6vw;
    height: 6vw;
    min-height: 3em;
    min-width: 3em;
    @media($small) {
        width: 4em;
        height: 4em;
    }
}

h1 {
    font-family: 'Dejavu Sans Mono', Lucida Console, Consolas, monospace;
    font-size: 3vw;

    @media($small) {
        font-size: 2em;
    }
}
</style>
