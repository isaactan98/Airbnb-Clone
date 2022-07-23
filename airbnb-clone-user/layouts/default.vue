<template>
  <div>
    <Header></Header>
    <TopFilter></TopFilter>
    <Nuxt />
  </div>
</template>

<script>
import Header from '~/components/Header.vue';
import TopFilter from '../components/TopFilter.vue';
export default { components: { Header, TopFilter } }
</script>

<style>
</style>