<template>
  <div>
    <Header :user="user"></Header>
    <Nuxt />
    <BottomNav></BottomNav>
  </div>
</template>

<script>
import Header from '~/components/Header.vue';
import BottomNav from '~/components/BottomNav.vue';
export default {
  components: { Header, BottomNav },
  data() {
    return {
      user: null
    }
  }
};
</script>

<style>
</style>