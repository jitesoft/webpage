<template>
    <div>
        <h2>Contact</h2>
        <address>
            <img :src="icons.Email" alt="Email"><br>
            <span aria-label="Email address">
                johannes@jitesoft.com<br>
            </span>
            <img :src="icons.Phone" alt="Phone"><br>
            <span aria-label="Phone number">
                +46 72 889 49 19<br>
            </span>

            <img :src="icons.Envelope" alt="Postal"><br>
            <span aria-label="Physical address">
                Jitesoft<br>
                c/o Johannes Tegnér<br>
                Juryvägen 10<br>
                226 57<br>
                Lund - Sweden
            </span>
        </address>
    </div>
</template>
<script>
import * as Icons from 'src/img/icons';

export default {
  name: 'Contact',
  data () {
    return {
      icons: Icons
    };
  }
};
</script>
<style scoped lang="scss">
img {
    &:nth-child(1) {
        padding-top: 0;
    }
    padding-top: 2em;
    max-height: 2vh;
}
</style>
