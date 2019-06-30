<template>
  <div id="app" class="container-fluid">    
    <header></header>
    <perfil></perfil>
    <eventos></eventos>
    <img width="150" src="./assets/ufg.png">
    <footer></footer>
  </div>
</template>

<script>
import Perfil from './components/Perfil'
import Header from './components/Header'
import Footer from './components/Footer'
export default {
  name: 'app',
  components: {
    'perfil':Perfil,
    'header':Header,
    'footer':Footer
  }
}
</script>

<style>


#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  text-align: center;
  color: #2c3e50;
  display: block;
}

h1, h2 {
  font-weight: normal;
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


