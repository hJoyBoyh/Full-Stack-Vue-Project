<script>
import axios from 'axios'
export default {
    data() {
        return {
            User: {
                email: null,
                password: null
            },
            UserInfo: '',
            text: ''

        }
    },
    mounted() {
        this.UserInfo = sessionStorage.getItem('user')
        console.log(this.UserInfo)
        // voir si le user est vide

    }
    ,
    methods: {
        onLogin() {
            var data = new FormData()

            data.append('email', this.User.email)
            data.append('password', this.User.password)

            axios.post("http://localhost:4208/Full-Stack-Vue-Project/php-backend/connexion.php", data).then((res) => {

                this.text = String(res.data)

                if (res.data.error) {

                    console.log(res.data.error)
                }


                // quand php nous envoie une erreur le mot warning est toujours present donc on utilise warning pour savoir si le user existe vraiment
                if (this.text.includes('Warning')) {

                    setTimeout(function () {
                        window.location.href = "login";
                    }, 200)
                    alert('courriel ou mot de passe incorrect')

                }


                else {
                    //init user session variable
                    sessionStorage.setItem("user", res.data)

                    // pour init le panier
                    sessionStorage.setItem('panier', '')

                    
                    setTimeout(function () {
                        window.location.href = "profil";
                    }, 200)

                }
            }).catch((err) => {
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
        <h2>Connexion</h2>
        <div>

            <label for="courriel">Courriel:</label>
            <input type="email" id="courriel" name="courriel" required v-model="User.email">

            <label for="mdp">Mot de passe:</label>
            <input type="password" id="mdp" name="mdp" required v-model="User.password">

            <button @click="onLogin">login</button>
            <!-- <input type="submit" value="Connecter" class="button-1">-->
            <!-- <p>Vous n'avez pas de compte? <a href="./inscription.php">S'inscrire</a></p>-->
        </div>
        <div v-if="UserInfo !== null">
            <h1>ahah c est bon</h1>
        </div>


    </div>
</template>

<style scoped>
.logo {
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

.container>div>h2 {
    text-align: center;
}



.container>div>label {
    margin-top: 10px;
    font-weight: bold;
}

.container input[type="text"],
.container input[type="email"],
.container>div>input[type="password"] {
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 3px;
}




.container>div {
    display: flex;
    flex-direction: column;
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

