<template>
  <div class="hello">
    <h1>Radars!</h1>
    <button @click="api">GO!</button>
  </div>
</template>

<script>
  import axios from 'axios'
export default {
  name: 'HelloWorld',
  props: {
    msg: String
  },
  data() {
    return {
      terrain_type: 'a',
      band: 'C',
      polarization: 'hh'
    }
  },
  methods: {
    api(){
      axios.get('http://localhost:8080/radar/app/api/get_dat.php?terrain_type=' + this.terrain_type + '&band=' + this.band + '&polarization=' + this.polarization)
        .then(response => {
          console.log(response.data.success)
        })
        .catch(e => {
          console.log(e)
        })
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
