<template>
    <footer>
        <address>
            <span v-for="(item, index) in addressLines" :key="index">
                {{ item }}
            </span>
        </address>
    </footer>
</template>

<script>
import Vue from 'vue';

export default Vue.component('FooterSection', {
  data () {
    return {
      addressLines:
        [
          'Jitesoft',
          'Juryvägen 10',
          'Lund - SWEDEN',
          '8510033999'
        ]
    };
  }
});
</script>

<style lang="scss" scoped>
footer {
  position: relative;
  padding: 2rem;

  &::before {
    content: '';
    width: 100%;
    height: 3px;
    background-color: black;
    position: absolute;
    top: 0;
    left: 0;
    border-radius: 20px;
  }
}

address {
    margin: 0 auto;
    align-items: center;

    display: flex;
    flex-direction: column;

    font-family: 'Dejavu Sans Mono', Lucida Console, Consolas, monospace;
    font-size: 0.8em;

    span {
        text-align: center;
        min-width: 30%;
    }
}

</style>
