<template>
    <div id="menu">
        <div class="link-container">
            <a href="#" @click.prevent="onClick('contact')" class="link link-internal">Contact</a>
            <a href="#" @click.prevent="onClick('about')" class="link link-internal">About</a>
            <a href="#" @click.prevent="onClick('home')" class="link link-internal">Home</a>
        </div>
        <div class="link-container">
            <a href="https://github.com/jitesoft" class="link-external link" target="_blank">Github</a>
            <a href="https://gitlab.com/jitesoft" class="link-external link" target="_blank">GitLab</a>
            <a href="https://bitbucket.org/jitesoft" class="link-external link" target="_blank">Bitbucket</a>
            <a href="https://twitter.com/jitesoft" class="link-external link" target="_blank">Twitter</a>
            <a href="https://facebook.com/jitesoft" class="link-external link" target="_blank">Facebook</a>
        </div>
    </div>
</template>

<script>
  export default Vue.component('main-menu', {
    name: 'main-menu',
    methods: {
      onClick: function (page) {
        this.$emit('click', page);
      }
    }
  });
</script>

<style scoped>

</style>
