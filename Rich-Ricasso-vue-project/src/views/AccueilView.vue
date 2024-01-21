<!-- eslint-disable vue/multi-word-component-names -->
<script>
import axios from 'axios'
import FooterView from '../views/FooterView.vue'
export default {
  data() {
    return {
      InfolettreInfo: {
        email: ''
      }

    }
  },
  components: { FooterView }
  ,
  methods: {
    toggleInfolettre() {
      var data = new FormData()

      data.append('email', this.InfolettreInfo.email)


      axios.post("http://localhost:4208/Full-Stack-Vue-Project/php-backend/infolettre.php", data).then((res) => {
        if (res.data.error) {
          console.log(res.data.error)
        }

        else {

          setTimeout(function () {
            window.location.href = "/";
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
  <div class="section-1">

    <div class="pic-ctn">
      <img src="../assets/img/cravate1.png" alt="" class="pic">
      <img src="../assets/img/shirt1.png" alt="" class="pic">
      <img src="../assets/img/cravate3.png" alt="" class="pic">
      <img src="../assets/img/shirt5.png" alt="" class="pic">
      <img src="../assets/img/cravate2.png" alt="" class="pic">
    </div>
    <div class="rich-accueil">
      <h1>Rich Ricasso Collections</h1>
      <h2 class="hero-info">Au sommet du luxe</h2>

      <button> voir plus</button>


    </div>

  </div>
  <div class="section-2">
    <h1>The man behind that revolution</h1>
    <div class="rich-ricasso">
      <img src="../assets/img/Rich_Ricasso.png" alt="">
      <div>
        <h3>Rich Ricasso</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, illo consequuntur quidem placeat impedit ab
          consectetur tempora natus facere quae nisi velit repellendus suscipit, voluptate, voluptatem saepe iste iure
          quasi.
          Autem hic ducimus quisquam quam commodi officiis ipsum? Animi porro commodi officiis in. Facere delectus ex
          molestiae nemo nobis similique distinctio enim a labore quo, obcaecati consectetur dolor ad vero.</p>
      </div>
    </div>
  </div>
  <div class="section-3">
    <h1>Infolettre</h1>
    <span>Ne ratez aucune offre</span>
    <div class="form">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" required v-model="InfolettreInfo.email">
      <button @click="toggleInfolettre">S'inscrire</button>
    </div>
  </div>
  <FooterView></FooterView>
</template>




<style scoped>
.section-1 {
  display: flex;
  flex-direction: row;
  width: 100vw;
  height: 100vh;
  justify-content: space-around;
}

.rich-accueil {
  display: flex;
  flex-direction: column;
  justify-content: center;

}

.section-2 {
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  width: 100vw;
  height: 110vh;
  align-items: center;
  background-color: #130a35;
  color: white;
  border-radius: 3%;
}

.rich-ricasso>img {
  height: 300px;
  width: 50%;
}

.rich-ricasso {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-left: 10%;
  margin-right: 10%;
  gap: 15px;
}

.section-3 {
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  width: 100vw;
  height: 110vh;
  align-items: center;


}

/*caroussel*/
.pic {
  height: 300px;
}

.pic-ctn {
  width: 50vw;
  height: 200px;
}

@keyframes display {
  0% {
    transform: translateX(200px);
    opacity: 0;
  }

  10% {
    transform: translateX(0);
    opacity: 1;
  }

  20% {
    transform: translateX(0);
    opacity: 1;
  }

  30% {
    transform: translateX(-200px);
    opacity: 0;
  }

  100% {
    transform: translateX(-200px);
    opacity: 0;
  }
}

.pic-ctn {
  position: relative;
  width: 30vw;
  height: 300px;
  margin-top: 15vh;
}

.pic-ctn>img {
  position: absolute;
  top: 0;
  left: calc(50% - 100px);
  opacity: 0;
  animation: display 10s infinite;
}

img:nth-child(2) {
  animation-delay: 2s;
}

img:nth-child(3) {
  animation-delay: 4s;
}

img:nth-child(4) {
  animation-delay: 6s;
}

img:nth-child(5) {
  animation-delay: 8s;
}</style>