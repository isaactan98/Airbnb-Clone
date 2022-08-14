<template>
  <div>
    <Header :user="user"></Header>
    <Nuxt />
    <BottomNav :user="user"></BottomNav>
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
  },
  mounted() {
    let token = localStorage.getItem('user_token') ?? null
    if (token != null) {
      this.$axios.$post('/api/user_token', {
        user_token: token
      }).then((result) => {
        this.user = result
      }).catch((error) => {
        console.log(error);
      })
    }
  }
};
</script>

<style>
</style>