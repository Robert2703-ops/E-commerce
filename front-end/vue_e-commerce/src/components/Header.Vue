<template>
    <header class="header">
        <div class="option">
            <img class="logo">
                <h1>Logo</h1>
            </img>
        </div>
        <div class="option">
            <ul class="navigation" type="none">
                <router-link v-bind:to="'/'">Home</router-link>
                <router-link v-bind:to="'/market'">Market</router-link>
                <router-link v-bind:to="'#'">Test</router-link>

            </ul>
        </div>
        <div class="option search-cart">
            <div class="search">
                <div>Search icon</div>
                <input type="text" class="search" placeholder="search">
            </div>
            <div class="user-profile">
                <p>User profile / cart</p>
            </div>
        </div>
    </header>
</template>

<script>

    export default {
        name: 'NavHeader'
    }

</script>

<style>
header.header {
    width: 100%;

    display: flex;
    justify-content: space-between;
}

header.header .option {
    width: 30%;

    display: flex;
    align-items: center;
    justify-content: center;
}

ul.navigation {
    width: 100%;

    display: flex;
    justify-content: space-around;

    padding: 0;
}

.option.search-cart {
    display: flex;
    align-items: center;
    justify-content: center;
}

.search {
    /* height: 100%; */

    display: flex;
    align-items: center;
    justify-content: center;
}
</style>