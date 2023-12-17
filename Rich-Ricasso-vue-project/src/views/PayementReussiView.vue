<script>
import axios from 'axios'
export default {
    data() {
        return {
            produitsAcheter: [],
            UserInfo : sessionStorage.getItem('user').split(" "),

        }
    },
    mounted() {

        // reset le panier
        sessionStorage.setItem('panier', '')
     
        sessionStorage.getItem('produitsAcheter').split(',').forEach(element => {
            this.produitsAcheter.push(parseInt(element))
        });
        

        // add produit dans produits acheter selon le user
        this.produitsAcheter.forEach(element => {
            var data = new FormData()
             data.append('id',this.UserInfo[0])
             data.append('produitId',element)
            axios.post("http://localhost:4208/Projet3/php-backend/produitAcheter.php",data).then((res)=>{
                if(res.data.error){
                    console.log(res.data.error)
                }
                else{
                    console.log('we good')
                    setTimeout(function(){
                         window.location.href="produit";
                        },200)
                }

            })

            
        });

       
    }
}
</script>
<template>
    <h1>Success</h1>
</template>