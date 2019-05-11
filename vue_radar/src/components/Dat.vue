<template>
  <div class="dat-container">
    <h1>Radars!</h1>
    <div>
      1. Choose terrain Type
      <select v-model="terrainType" @change="polarization = band = ''">
        <option v-for="type in Object.keys(terrainTypes)">
          {{ type }}
        </option>
      </select>
    </div>
    <div v-if="terrainType">
      2. Choose band
      <select v-model="band" @change="polarization = ''">
        <option v-for="band in filterBands">{{ band }}</option>
      </select>
    </div>
    <div v-if="terrainType && band">
      3. Choose polarization
      <select v-model="polarization">
        <option v-for="polarization in filterPolarization">{{ polarization }}</option>
      </select>
    </div>
<!--    <button @click="api">GO!</button>-->
  </div>
</template>

<script>
  import axios from 'axios'
export default {
  name: 'Dat',
  props: {
    msg: String
  },
  created(){
    this.getTerrainTypes()
  },
  data() {
    return {
      terrainTypes: [], // loaded from server on created()
      terrainType: '', // (dat)
      band: '', // (dat)
      polarization: '' // (dat)
    }
  },
  computed: {
    filterBands(){
      const terrainObj = this.terrainTypes[this.terrainType]
      let bands = []
      if(terrainObj) {
        terrainObj.forEach(obj => {
          let found = bands.find(band => {
            return band == obj.band
          })
          if (!found) {
            bands.push(obj.band)
          }
        })
      }
      return bands
    },
    filterPolarization(){
      const terrainObj = this.terrainTypes[this.terrainType]
      let polarizations = []
      if(terrainObj){
        let bands = terrainObj.filter(obj => { return obj.band == this.band })
        if(bands){
          bands.forEach(band => {
            polarizations.push(band.polarization)
          })
        }
      }
      return polarizations
    },
  },
  methods: {
    // Provides date types and all corresponding bands and polarizations where there is data
    getTerrainTypes(){
      axios.get('http://localhost:8080/radar/app/api/get_dat.php?function=getTerrainTypes')
        .then(response => {
          this.terrainTypes = response.data
        })
        .catch(e => {
          console.log(e)
        })
    },
    getAllowedBandsAndPolarization(){
      //axios.get('http://localhost:8080/radar/app/api/get_dat.php?terrain_type=' + this.terrainType + '&band=' + this.band + '&polarization=' + this.polarization)
      axios.get('http://localhost:8080/radar/app/api/get_dat.php?function=getAllowedBandsAndPolarization&terrain_type=' + this.terrainType)
        .then(response => {
          this.allowedOptions = response.data
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
