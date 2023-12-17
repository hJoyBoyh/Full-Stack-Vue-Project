<script setup>

import NavController from './views/NavController.vue'


</script>

<template>
  
  <NavController></NavController>
  
</template>

<style>

main{
  min-height: 100vh;
  min-width: 100vw;
  height: 100vh;
  width: 100vw;
}

header{
  width: 100vw;
  height: 10vh;
  background-color: white;
}
nav{
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: space-around;
  align-items: center;
  list-style-type: none;
  border-bottom: 1px solid white;
}
nav>li{
  cursor: pointer;
}
nav>div{
  height: 60%;
  width: 50%;
  display: flex;
  justify-content: space-around;
  align-items: center;
  border: 1px solid white;
  border-radius: 10%;
  list-style-type: none;
  color: black;
 
}
nav>div a.router-link-exact-active{
  cursor: pointer;
  color: black;
  text-decoration: none;
}
nav>div a.router-link-exact-active:hover {
  color: red;
}
nav>div a.router-link-exact-active:visited {
  color: red;
}
nav>a.router-link-exact-active:hover {
  color: red;
}
nav>a.router-link-exact-active:visited {
  color: red;
}

</style>
