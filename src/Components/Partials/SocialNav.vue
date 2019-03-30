<template>
    <div class="nav">
        <div :key="link.name" v-for="link in links">
            <a :title="link.desc" :href="link.uri" target="_blank">
                <img :alt="link.name" :src="link.icon">
            </a>
        </div>
    </div>
</template>
<script>
import Vue from 'vue';
import * as Icon from 'src/img/icons';

export default Vue.component('SocialNav', {
  data () {
    return {
      links: [
        {
          name: 'GitLab',
          desc: 'Jitesoft open source projects on GitLab.',
          icon: Icon.GitLab,
          uri: 'https://gitlab.com/jitesoft'
        },
        {
          name: 'GitHub',
          desc: 'Jitesoft open source projects on GitHub.',
          icon: Icon.GitHub,
          uri: 'http://github.com/jitesoft'
        },
        {
          name: 'DockerHub',
          desc: 'Docker images by Jitesoft.',
          icon: Icon.Docker,
          uri: 'https://hub.docker.com/u/jitesoft'
        },
        {
          name: 'Patreon',
          desc: 'Jitesoft @ Patreon',
          icon: Icon.Patreon,
          uri: 'https://www.patreon.com/jitesoft'
        },
        {
          name: 'LinkedIn',
          desc: 'Jitesoft @ LinkedIn.',
          icon: Icon.LinkedIn,
          uri: 'https://www.linkedin.com/company/jitesoft'
        },
        {
          name: 'FaceBook',
          desc: 'Jitesoft @ FaceBook.',
          icon: Icon.Facebook,
          uri: 'http://facebook.com/jitesoft'
        },
        {
          name: 'Twitter',
          desc: 'Jitesoft @ Twitter.',
          icon: Icon.Twitter,
          uri: 'https://twitter.com/@jitesoft'
        }
      ]
    };
  }
});
</script>
<style lang="scss">
@import 'src/styles/vars.scss';
$height: 2.3em;

.nav {
    @media($medium) {
        height: 2em;
        width: calc(2em * 12);
        justify-content: space-between;
    }

    @media($small) {
        width: 1.4em;
        height: calc(1.4em * 12);
        flex-flow: column;
        justify-content: space-between;
        position: absolute;
        right: 1em;
    }

    display: flex;
    flex-flow: row;
    justify-content: space-between;
    height: $height;
    width: calc(#{$height} * 12);

    div {
        @media($small) {
            width: 1.4em;
            height: 1.4em;
        }

        width: $height;
        height: $height;

        &:hover {
            opacity: 0.4;
        }

        :active {
            opacity: 0.2;
        }

        img {
            height: 100%;
        }
    }
}
</style>
