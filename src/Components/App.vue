<template>
  <component :is="layout">
    <router-view></router-view>
  </component>
</template>

<script>
import Vue from 'vue';

export default Vue.component('App', {
  computed: {
    layout () {
      return 'default-layout';
    }
  }
});
</script>

<style lang="scss">

  @function strip-unit($value) {
    @return $value / ($value * 0 + 1);
  }

  @mixin fluid-type($min-vw, $max-vw, $min-font-size, $max-font-size) {
    $u1: unit($min-vw);
    $u2: unit($max-vw);
    $u3: unit($min-font-size);
    $u4: unit($max-font-size);

    @if $u1 == $u2 and $u1 == $u3 and $u1 == $u4 {
      & {
        font-size: $min-font-size;
        line-height: $min-line-height;

        @media screen and (min-width: $min-vw) {
          font-size: calc(#{$min-font-size} + #{strip-unit($max-font-size - $min-font-size)} * ((100vw - #{$min-vw}) / #{strip-unit($max-vw - $min-vw)}));
        }

        @media screen and (min-width: $max-vw) {
          font-size: $max-font-size;
        }
      }
    }
  }


  $min-width: 320px;
  $max-width: 1200px;
  $min-font: 17px;
  $max-font: 23px;
  $min-line-height: 1.2;
  $max-line-height: 1.5;

  :root {
    @include fluid-type($min_width, $max-width, $min-font, $max-font);
  }

  .content {
    padding-bottom: 2rem;
  }

  .content h2 {
    font-size: 3rem;
    text-align: center;
    position: relative;

    &::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 3px;
      background-color: black;
      border-radius: 5px;
    }
  }

  .content p {
    line-height: 1.2;

    @media (min-width: 768px) {
      line-height: 1.35;
    }

    @media (min-width: 768px) {
      line-height: 1.5;
    }
  }

</style>
