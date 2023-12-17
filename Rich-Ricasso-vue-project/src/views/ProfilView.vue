<script>
import axios from 'axios'

export default{
    data(){
        return{
            show :true,
            UserInfo : sessionStorage.getItem('user').split(" "),

            User:{
                nom:null,
                email:null,
                password:null
            },
           
        }
    },
    methods:{
        toggleShow(){
            this.show = !this.show
        },
        toggleDeconnecter(){
            sessionStorage.clear()
            setTimeout(function(){
                         window.location.href="/";
                        },200)
        },
        updateInfo(updateType){
            alert('Veuillez vous reconnectez')

            var data = new FormData()

            if(updateType == "updateNom"){
                data.append('updateNom','updateNom')
            }
            if(updateType == "updateEmail"){
                data.append('updateEmail','updateEmail')
            }
            if(updateType == "updatePassword"){
                data.append('updatePassword','updatePassword')
            }
           

            data.append('id',this.UserInfo[0])
            data.append('nom',this.User.nom)
             data.append('courriel',this.User.email)
             data.append('mdp',this.User.password)
            
             axios.post("http://localhost:4208/Projet3/php-backend/updateInfo.php",data).then((res)=>{
                if(res.data.error){
                       console.log(res.data.error)
                    }
                else{
                    console.log(res.data)
                }

                })
                sessionStorage.clear()
            setTimeout(function(){
                         window.location.href="login";
                        },200)

               
        }
    }

}
</script>
<template>
    <h1>Mon Compte</h1>
            <div id="parametre">
                <div class="user-general">
                    <div class="user-name-img">
                    <img src="../img/user2.png" alt="" srcset="" class="user-img">
                    <p id="user-name">{{UserInfo[3]}}</p>
                </div>
                
                    <ul  id="user-choix">
                        <li id="btn-profil" @click="toggleShow">Profil</li>
                        <li id="btn-compte-securite" @click="toggleShow">Sécurité du compte</li>
                        <li @click="toggleDeconnecter"> Deconnecter</li>
                    </ul>
                </div>
                <div id="user-display">
                    <div id="user-profil-info" v-if="show == true">
                        <span>Nom Complet</span>
                        <h3 id="fullName">{{UserInfo[3]}}</h3>
                        <hr>
                        <span>Courriel:</span>
                        <h3 id="email">{{UserInfo[5]}}</h3>
                        <hr>


                    </div>
                    <div id="user-securite-info" v-if="show == false">
                        <h2>Pour update assurez vous de vous trouver au même endroit que vous vous êtes inscrit</h2>
                        <div>
                            <input type="hidden" :id="UserInfo[0]" name="id" :value="UserInfo[0]">
                            <input type="hidden" id="updateNom" name="updateNom" value="updateNom">
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" name="nom" :placeholder="UserInfo[3]" v-model="User.nom">
                            <button @click="updateInfo('updateNom')"> Update nom</button>
                        </div>
                            <div>
                            <input type="hidden" :id="UserInfo[0]" name="id" :value="UserInfo[0]">
                            <input type="hidden" id="updateEmail" name="updateEmail" value="updateEmail">
                            <label for="courriel">Courriel</label>
                            <input type="email" id="courriel" name="courriel" :placeholder="UserInfo[5]"  v-model="User.email">
                            <button @click="updateInfo('updateEmail')"> Update courriel</button>
                        </div>
                            <div>
                            <input type="hidden" :id="UserInfo[0]" name="id" :value="UserInfo[0]">
                            <input type="hidden" id="updatePassword" name="updatePassword" value="updatePassword" >
                            <label for="MDP">Mot de passe</label>
                            <input type="password" id="mdp" name="mdp"  placeholder="mot de passe" v-model="User.password">
                            <button @click="updateInfo('updatePassword')"> Update mdp</button>
                        </div>


                    </div>
                    

                </div>
            </div>


</template>
<style>
.user-img{
    height: 50px;
    width: 50px;
}
#parametre{
    height: 80%;
    width: 80%;
    border: 2px solid #a40000;
    display: flex;

}
.user-general{
    height: 100%;
    width: 25%;
    border-right: 2px solid #a40000;;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.user-name-img{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-top: 5%;
    border-bottom:2px solid #a40000 ;
}
#user-choix{
    
    display: flex;
    flex-direction: column;
    justify-content: start;
    align-items: center;
    height: 50%;
   margin-top: 20%;
    gap :15%;
    padding: 0;
}
#user-choix>li{
    list-style-type: none;
    font-size: 1.2em;
    cursor: pointer;
}
#user-choix>li:hover{
    color: #013B5D;
}
#user-display{
    height: 100%;
    width: 100%;
}
#user-profil-info,#user-securite-info{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    gap:5%;
    height: 100%;
    width: 100%;
}
</style>