<script>
import { RouterLink, RouterView } from 'vue-router'


export default{
    data(){
    return{
            UserInfo : sessionStorage.getItem('user'),
    }
    
},
mounted(){
    this.UserInfo = sessionStorage.getItem('user')
        console.log(this.UserInfo)
    this.isPanierVide = sessionStorage.getItem('panier')


},

components:{RouterLink, RouterView},

}


</script>
<template>
    <header>
        <nav>
            <li>
               Rich ricasso
            </li>

        <div>
            <RouterLink to="/">Accueil</RouterLink>
            <RouterLink to="/produit">Produit</RouterLink>
            
        </div>

        <section v-show="UserInfo === null">
        <li>
            <RouterLink to="/signup">SignUp</RouterLink>
        </li>
        <li>
            <RouterLink to="/login">Login</RouterLink>
        </li>
        </section>

        
        <li v-show="UserInfo !== null">
            <RouterLink to="/profil">Profil</RouterLink>
        </li>
        <li v-show="UserInfo !== null ">
            <RouterLink to="/panier">Panier</RouterLink>
        </li>

       
        
            
        </nav>
    </header>
    <main>
        <RouterView/>
    </main>

</template>



<style scoped>

.modal{
    height: 100vh;
    width: 100vw;
    position: absolute;
    top:0;
 
}
</style>