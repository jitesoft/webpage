<template>
    <div>Hi!</div>
</template>

<script>
  export default Vue.component('page', {
    name: 'page'
  });
</script>

<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Source Code Pro', monospace;
        margin: 0;
        line-height: 120%;
        font-size:100%;
        text-align: center;

        a {
            color: #636b6f;
        }

        .content {

            h1 {
                font-size: 10vw;
            }

            h2 {
                font-size: 1.7em;
            }

            p {
                padding: 20px;
                margin: auto;
                font-size: 1.2em;
                font-family: monospace;
                width: 100%;
                max-width: 320px;
                text-align: center;
            }
        }

        footer {
            position: fixed;
            left: 0;
            right: 0;
            bottom: 0;
            padding: 20px;
            text-align: center;
            font-size: 11px;

            .link-container {

                display: block;

                .link-internal {
                    font-size: 12px;
                }

                .link-external {
                    font-size: 11px;
                }
            }




        }
    }

    .hidden {
        display:none;
    }

</style>
