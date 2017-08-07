<template>
  <div id='app'>
      <AppHeader :active.sync='activeSection'></AppHeader>
      <main class='container-fluid'></main>
  </div>
</template>

<script>
import AppHeader from './components/AppHeader.vue';

export default {
  name: 'app',
  data() {
      return {
          activeSection: window.location.hash.slice(1)
      };
  },
  components: {
      AppHeader
  }
};
</script>

<style></style>
