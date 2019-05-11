<template>
  <div class="home">
    <img alt="Vue logo" src="../assets/logo.png">
    <Dat msg="Welcome to Your Vue.js App"/>
  </div>
</template>

<script>
// @ is an alias to /src
import Dat from '@/components/Dat'

export default {
  name: 'home',
  components: {
    Dat
  }
}
</script>
