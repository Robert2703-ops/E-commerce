<template>
  <div id="app"> 
    <NavHeader></NavHeader>

    <router-view></router-view>
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
    components: {
      NavHeader,
      Home,
      Market
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
