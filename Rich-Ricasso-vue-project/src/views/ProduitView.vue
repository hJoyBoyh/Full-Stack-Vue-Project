<script>
import axios from 'axios'

export default{

 
    data(){
        
        return{
            singleProduit: '',
            produits:'',
            couleur:'',
            taille:'',
            categorie:'',
            id:'',
            panier:[],
            panierSave:'',

            
        
          
        }
        
        

    },
   
    methods:{
        addProductToPanier(id){
            // si le user est pas connnecter on le renvoie au view login
            if(sessionStorage.getItem('user') == null){
                window.location.href = "login";
            }
            // panier qui est save en permanence
           this.panierSave= sessionStorage.getItem('panier').split(',')

           // add le produit selectionner au panier
           this.panier.push(id)
           //console.log(this.panierSave)
            
            // rajouter les produits save dans le panier actuelle pour tout rassembler
            if(sessionStorage.getItem('panier') != ''){
                this.panierSave.forEach(element => {
                    this.panier.push(parseInt(element))
                });
            
            }

            // set le panier avec les produits selectionner actuelle
            sessionStorage.setItem('panier',this.panier)
            console.log(this.panier)
            
        },
     
        onQuitOneProduit(){
            document.querySelector('.column').style.display="flex"
            this.singleProduit = ''
        },
        onClickOneProduit(id){
            axios.get(`http://localhost:4208/Full-Stack-Vue-Project/php-backend/?action=produit-id${id}`).then((res)=>{
            this.singleProduit = res.data
            console.log(this.singleProduit)
            document.querySelector('.column').style.display="none"
            //this.categorie = "Tous"
        })
        },
        onChangeTaille(event){
            console.log(event.target.value)
            axios.get(`http://localhost:4208/Full-Stack-Vue-Project/php-backend/?action=produit-${this.taille}`).then((res)=>{
            this.produits = res.data
            console.log(this.produits)
            this.categorie = `Par Taille: ${this.taille}`
        })
            
        },
        onChangeCouleur(event){
            console.log(event.target.value)
            axios.get(`http://localhost:4208/Full-Stack-Vue-Project/php-backend/?action=produit-${this.couleur}`).then((res)=>{
            this.produits = res.data
            console.log(this.produits)
            this.categorie = ` Par Couleur: ${this.couleur}`
        })
            
        },
        toggleTous(){
            axios.get('http://localhost:4208/Full-Stack-Vue-Project/php-backend/?action=produit').then((res)=>{
            this.produits = res.data
            console.log(this.produits)
            this.categorie = "Tous"
        })
        },
        toggleChemise(){
        
            axios.get('http://localhost:4208/Full-Stack-Vue-Project/php-backend/?action=produit-chemise').then((res)=>{
            this.produits = res.data
            console.log(this.produits)
            this.categorie = "Chemise"
        })
        },
        toggleCravate(){
         


            axios.get('http://localhost:4208/Full-Stack-Vue-Project/php-backend/?action=produit-cravate').then((res)=>{
            this.produits = res.data
            console.log(this.produits)
            this.categorie = "Cravate"
        })
        },
        toggleASC(){
        
            axios.get('http://localhost:4208/Full-Stack-Vue-Project/php-backend/?action=produit-asc').then((res)=>{
            this.produits = res.data
            console.log(this.produits)
            this.categorie = "ASC"
        })
        }
        ,
        toggleDESC(){
        
            axios.get('http://localhost:4208/Full-Stack-Vue-Project/php-backend/?action=produit-desc').then((res)=>{
            this.produits = res.data
            console.log(this.produits)
            this.categorie = "DESC"
        })
        }
    }
    
    ,
    mounted(){
        axios.get('http://localhost:4208/Full-Stack-Vue-Project/php-backend/?action=produit').then((res)=>{
            this.produits = res.data
            console.log(this.produits)
            this.categorie = "Tous"
        })
    }
}
</script>
<template>
    <div class="produit-container">

        <div class="affichage-produit">
            <h1>{{categorie}}</h1>
            <div class=column>

                <div v-for="item in produits" :key="item.id" class="card-produit" @click="onClickOneProduit(item.id)">
                    <h1 class="id">{{item.id}}</h1>
                    <img :src="item.image" :alt="item.type" class="piece-img">
                    <h2>{{item.type}}</h2>
                    <h3>{{item.couleur}}</h3>
                    <h4>{{item.prix}}</h4>
                
                </div>
                
            </div>
            <div v-show="singleProduit != ''">
                <button @click="onQuitOneProduit()" class="button-1">quit</button>
                <h1 class="id">{{singleProduit.id}}</h1>
                <img :src="singleProduit.image" :alt="singleProduit.type" class="piece-img">
                <h2>{{singleProduit.type}}</h2>
                <h3>{{singleProduit.couleur}}</h3>
                <h4>{{singleProduit.prix}}</h4>
                <button @click="addProductToPanier(singleProduit.id)"  class="button-1">Add panier</button>
              

            </div>


        </div>
        <div class="categories">
            <li class="categorie" @click="toggleTous">Tous</li>
            <li class="categorie" @click="toggleCravate">Cravatte</li>
            <li class="categorie" @click="toggleChemise">Chemise</li>
            <li class="categorie" @click="toggleASC" >ASC</li>
            <li class="categorie" @click="toggleDESC">DESC</li>


            <div>
            <label for="couleur-select">Par Couleur</label>
            <select name="couleurs" id="couleur-select" @change="onChangeCouleur($event)" v-model="couleur">
                <option value="">--Choisir une option--</option>
                <option value="blanc">Blanc</option>
                <option value="violet">Violet</option>
                <option value="rose">Rose</option>
                <option value="vert">Vert</option>
                
            </select>
            </div>

            <div>
            <label for="tailles-select">Par Taille</label>
            <select name="tailles" id="tailles-select" @change="onChangeTaille($event)" v-model="taille">
                <option value="">--Choisir une option--</option>
                <option value="unique">Unique</option>
                <option value="quarantequatre">44</option>
                <option value="quarantehuit">48</option>
                <option value="cinquantequatre">54</option>
                <option value="cinquantesix">56 </option>
                
            </select>
            </div>
        </div>
       

    </div>
</template>



<style scoped>
main{
    min-width: 100vw;
    min-height:100vh;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}
.produit-container{
    height:auto;
    min-height:100vh;
    width:100vw;
    display: flex;
    justify-content: space-between;
    align-items: center;
   
    background-color: rgba(252, 252, 255, 0.4);
    backdrop-filter: blur(15px);
    position: relative;
    top:10vh;
    
    z-index: 100;

}
.categories{
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    height: 60vh;
    position: fixed;
    left: 75%;
    top :5%;

}
.categories>li{
    font-size: 2em;
    list-style-type: none;
    gap: 10%;
    cursor: pointer;
}
.affichage-produit
{
    width: 70%;
}
.column{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;

    width: 100%;
    gap:5%
}
.piece-img{
    height:20vw;
    width:20vw;
}

.isSelected{
    color: blue;
}


/* CSS */
.button-1 {
  background-color: #EA4C89;
  border-radius: 8px;
  border-style: none;
  box-sizing: border-box;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: "Haas Grot Text R Web", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 14px;
  font-weight: 500;
  height: 40px;
  line-height: 20px;
  list-style: none;
  margin: 0;
  outline: none;
  padding: 10px 16px;
  position: relative;
  text-align: center;
  text-decoration: none;
  transition: color 100ms;
  vertical-align: baseline;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-1:hover,
.button-1:focus {
  background-color: #F082AC;
}
.card-produit>img{
pointer-events: none;
}
@media only screen and (max-width: 750px){
    .produit-container{
       
        flex-direction: column-reverse;
        justify-content: space-around;
        align-items: center;
       
    
    }
    .categories{
      
        flex-direction: row;
        flex-wrap: wrap;
        width: 100vw;
        height: 30vh;
        position: relative;
        left: 0;
        top :0;
    
    }
    .categories>li{
        font-size: 1em;
      
    }
}
</style>