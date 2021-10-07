<template>
    <header class="header">
        <!-- desktop -->
        <div v-if="width.desktop" class="desktop">
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
            <div v-if="" class="option search-cart">
                <div class="search-container">
                    <div><i class="fas fa-search"></i></div>
                    <input type="text" class="search" placeholder="search">
                </div>
                <div class="user-profile-cart">
                    <div class="user-profile"><i class="fas fa-user"></i></div>
                    <div class="cart"><i class="fas fa-shopping-cart"></i></div>
                </div>
            </div>
        </div>

        <!-- mobile -->
        <div v-if="width.mobile" class="mobile">
            <div class="option">
                <div class="logo">
                    <h1>Logo</h1>
                </div>
                <div class="search-cart">
                    <div class="search-container">
                        <div><i class="fas fa-search"></i></div>
                        <input type="text" class="search" placeholder="search">
                    </div>
                    <div class="user-profile-cart" v-if="verify">
                        <div class="user-profile"><i class="fas fa-user"></i></div>
                        <div class="cart"><i class="fas fa-shopping-cart"></i></div>
                    </div>
                </div>
            </div>
            <div class="option">
                <ul class="navigation" type="none">
                    <router-link v-bind:to="'/'">Home</router-link>
                    <router-link v-bind:to="'/market'">Market</router-link>
                    <router-link v-bind:to="'#'">Test</router-link>
                </ul>
            </div>
        </div>
    </header>
</template>

<script>
    export default {
        props: ['data'],
        name: 'NavHeader',
        data() {
            return {
                width: {
                    mobile: false,
                    tablet: false,
                    desktop: true
                },
                verify: this.data,
                test: 1
            }

        },
        created() {
            this.ViewPort()
        },
        methods: {
            ViewPort() {
                const width = window.screen.width

                if ( width <= 530 ) {
                    this.width.mobile = true
                    this.width.tablet = false
                    this.width.desktop = false
                }

                else if ( width >= 540 && width <= 1024 ){
                    this.width.mobile = false
                    this.width.tablet = true
                    this.width.desktop = false
                }

                else {
                    this.width.mobile = false
                    this.width.tablet = false
                    this.width.desktop = true
                }    
            }
        },
    }

</script>

<style>
    header.header {
        width: 100%;
    }

    .desktop {
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
        justify-content: space-between !important;
    }

    .search-container input.search {
        margin-left: 5px;
    }

    .search-container {
        /* height: 100%; */

        display: flex;
        align-items: center;
        justify-content: center;
    }

    .user-profile-cart {
        width: 30%;

        display: flex;
        justify-content: space-between;
    }

    .user-profile-cart .user-profile, .user-profile-cart .cart {
        font-size: 25px;

        display: flex;
        justify-content: center;
    }

    .desktop, .mobile {
        width: 100%;
    }
    /* responsive */
    @media only screen and ( max-width: 530px ) {
        .mobile {
            display: flex;
            flex-direction: column;
        }
        .header .mobile .option {
            width: 100%;
            /* justify-content: space-between !important; */
        }
        .search-cart {
            display: flex;
        }
        input.search {
            width: 55%;
        }
        .user-profile-cart .user-profile, .user-profile-cart .cart {
            font-size: 20px;
        }
    }


</style>