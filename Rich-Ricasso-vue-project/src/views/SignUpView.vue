<script>
import axios from 'axios'
export default{

    data(){
        return{
            InscriptionUser:{
                nom:null,
                email:null,
                password:null
            }
        }
    }
    ,
    methods:{
        onSinscrire(){
            var data = new FormData()
            data.append('nom',this.InscriptionUser.nom)
             data.append('email',this.InscriptionUser.email)
             data.append('password',this.InscriptionUser.password)

             axios.post("http://localhost:4208/Projet3/php-backend/inscription.php",data).then((res)=>{
                if(res.data.error){
                       console.log(res.data.error)
                    }

                    else{
                      
                    
                        setTimeout(function(){
                         window.location.href="inscriptionReussi";
                        },200)}
                        
             }).catch((err)=>{
                console.log(err)
             })

        }
    }
}
</script>


<template>
    <div class="logo">
        <h1>Rich Ricasso</h1>
    </div>
    <div class="container">
        <h2>Inscription</h2>
        
        <div class="form">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required v-model="InscriptionUser.nom">

            <label for="courriel">Courriel:</label>
            <input type="email" id="courriel" name="courriel" required v-model="InscriptionUser.email">

            <label for="mdp">Mot de passe:</label>
            <input type="password" id="mdp" name="mdp" required v-model="InscriptionUser.password">

            <button @click="onSinscrire">S inscrire</button>
          <!--  <p>Vous avez déja un compte? <a href="./connexion.php">Se Connecter</a></p>-->
        </div>
    
    </div>

</template>

<style scoped>

.logo{
    text-align: center;
    min-height: 20vh;
    min-width: 100vw;
}


.container {
    width: 400px;
    margin: 0 auto;
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.container h2 {
    text-align: center;
}

.container .form {
    display: flex;
    flex-direction: column;
}

.container label {
    margin-top: 10px;
    font-weight: bold;
}

.container input[type="text"],
.container input[type="email"],
.container input[type="password"] {
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 3px;
}

.container input[type="submit"] {
    background-color: #007BFF;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

.container input[type="submit"]:hover {
    background-color: #0056b3;
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
</style>

