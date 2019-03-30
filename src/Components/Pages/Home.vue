<template>
    <div>
        <h2>Welcome!</h2>
        <p>
            Jitesoft is a private company (sole proprietorship) based in Sweden. Our main focus is backend development, containerization
            and operations within web, application and game development.
        </p>
        <p>
            If you wish to take a look at what we do, take a look at our open source projects on
            <a href="https://gitlab.com/jitesoft" target="_blank">GitLab</a> and <a href="https://github.com/jitesoft" target="_blank">GitHub</a>.<br>
            A lot of projects that are developed for external customers are under NDA, so if you wish to see references,
            feel free to contact us for more details.
        </p>
        <div class="info">
            Jitesoft is available for consulting and projects, feel free to <router-link to="/contact">contact</router-link> us with a short description
            and we will respond as soon as possible!
        </div>
    </div>
</template>
<script>
export default Promise.resolve({});
</script>
<style lang="scss" scoped>
    a {
        color: black;
    }

    .info {
        margin-top: 10vh;
        position: relative;
        transform: translate(-50%, 0);
        left: 50%;
        text-align: center;
        min-width: 60%;
        width: 60%;
        background-color: lightgray;
        padding: 2em;
        border-radius: 5% 5% 5% 5%;
        box-shadow: 1px 1px gray;
    }

</style>
