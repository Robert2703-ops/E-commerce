<template>
  <div id="app"> 
    <NavHeader v-bind:data="access"></NavHeader>

    <router-view v-bind:data="access"></router-view>
  </div>
</template>

<script>
  // App components
  import NavHeader from './components/Header'
  import Home from './components/Home'
  import Market from './components/Market'

  // others
  import VueRouter from 'vue-router'

  export default {
    name: 'App',
    data() {
      return {
        access: false
      }
    },
    components: {
      NavHeader,
      Home,
      Market
    },
    created() {

    },
    methods: {
      Access() {
        const token = localStorage.getItem('acces-token')

        if ( token ) {
          this.access = true
        }
        else {
          this.acces = false
        } 
      }
    }
  }
</script>

<style>
  body {
    margin: 0;
  }

  #app {
    width: 95%;
  }
</style>
