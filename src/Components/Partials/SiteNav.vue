<template>
    <div class="site-nav">
        <router-link class="item" to="/">
            <img alt="Home" title="Home" :src="icons.Home"/>
            <span>
                Home
            </span>
        </router-link>
        <router-link class="item" to="/values">
            <img alt="Core Values" title="Core Values" :src="icons.Heart"/>
            <span>
                Core Values
            </span>
        </router-link>
        <!--router-link class="item" to="/projects">
            <img alt="Projects" title="Projects" :src="icons.Project"/>
            <span>
                Projects
            </span>
        </router-link-->
        <router-link class="item" to="/contact">
            <img alt="Contact" title="Contact" :src="icons.Contact"/>
            <span>
                Contact
            </span>
        </router-link>
    </div>
</template>

<script>
import Vue from 'vue';
import * as Icons from 'src/img/icons';

export default Vue.component('SiteNav', {
  data () {
    return {
      icons: Icons
    };
  }
});
</script>

<style scoped lang="scss">
@import 'src/styles/vars.scss';

.site-nav {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;

    @media($small) {
        flex-direction: column;
    }
}

.item {
    font-family: 'Dejavu Sans Mono', Lucida Console, Consolas, monospace;
    padding-left: 1em;
    text-decoration: none;
    color: black;
    font-size: 0.9em;

    &:hover {
        color: gray;
    }

    img {
        height: 2em;
        width: 100%;
        display: none;
        @media($small) {
            display: block;
            padding-bottom: 1em;
            width: 1.4em;
            height: 1.4em;
        }
        &:hover {
            opacity: 0.6;
        }
    }

    span {
        @media($small) {
            display: none;
        }
    }

}

.router-link-exact-active {
    color: gray;

    img {
        opacity: 0.6;
    }
}
</style>
