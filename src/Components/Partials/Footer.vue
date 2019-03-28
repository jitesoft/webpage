<template>
    <div class="footer">
        <address>
            <span v-for="(item, index) in addressLines" :key="index">
                {{ item }}
            </span>
        </address>
    </div>
</template>

<script>
import Vue from 'vue';

export default Vue.component('footer', {
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

div {
    position: relative;
    bottom: 0;
    margin: 0 auto;
}

address {
    width: 50%;
    margin: 0 auto;
    align-items: center;

    display: flex;
    flex-direction: column;

    font-family: 'Dejavu Sans Mono', Lucida Console, Consolas, monospace;
    font-size: 0.9em;

    span {
        text-align: center;
        width: 30%;
    }
}

</style>
